<?php
declare(strict_types=1);

namespace App\Http\Controllers\Bug;

use App\Constants\Bug\BugSeverityEnum;
use App\Constants\Bug\BugStatusEnum;
use App\DataTransferObjects\Bug\BugCreateDto;
use App\Exceptions\Category\CategoryNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bug\BugCreateRequest;
use App\Models\Category\Category;
use App\Repositories\Interfaces\Bug\BugRepositoryInterface;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;
use DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BugCreateController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    private BugRepositoryInterface $bugRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        BugRepositoryInterface $bugRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->bugRepository = $bugRepository;
    }

    public function create(BugCreateRequest $request): JsonResponse
    {
        $category = $this->categoryRepository->findOneById($request->get('category'));

        if ($category instanceof Category ===false) {
            throw new CategoryNotFoundException('category not found.');
        }

        $createDto = new BugCreateDto(
            $request->get('title'),
            $request->get('description'),
            new BugSeverityEnum($request->get('severity')),
            new BugStatusEnum($request->get('status')),
            new DateTime($request->get('raised_at')),
            $request->get('solution')
        );

        $bug = $this->bugRepository->create($createDto, $category);
        
        return new JsonResponse($bug->toArray(), Response::HTTP_CREATED);
    }
}
