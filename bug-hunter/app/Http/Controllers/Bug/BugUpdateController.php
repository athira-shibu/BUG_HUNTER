<?php
declare(strict_types=1);

namespace App\Http\Controllers\Bug;

use App\Constants\Bug\BugSeverityEnum;
use App\Constants\Bug\BugStatusEnum;
use App\DataTransferObjects\Bug\BugUpdateDto;
use App\Exceptions\Bug\BugNotFoundException;
use App\Exceptions\Category\CategoryNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bug\BugUpdateRequest;
use App\Models\Bug\Bug;
use App\Models\Category\Category;
use App\Repositories\Interfaces\Bug\BugRepositoryInterface;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;
use DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BugUpdateController extends Controller
{
    private BugRepositoryInterface $bugRepository;

    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        BugRepositoryInterface $bugRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->bugRepository = $bugRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function update(string $id, BugUpdateRequest $request): JsonResponse
    {
        $bug = $this->bugRepository->findOneById($id);

        if ($bug instanceof Bug === false) {
            throw new BugNotFoundException(\sprintf('Bug not found with id-%s', $id));
        }

        $category = $this->categoryRepository->findOneById($request->get('category_id'));

        if ($category instanceof Category ===false) {
            throw new CategoryNotFoundException('category not found.');
        }
        
        $updateDto = new BugUpdateDto(
            $request->get('title'),
            $request->get('description'),
            new BugSeverityEnum($request->get('severity')),
            new BugStatusEnum($request->get('status')),
            new DateTime($request->get('raised_at')),
            $request->get('solution')
        );

        $bug = $this->bugRepository->update($bug, $updateDto, $category);

        return new JsonResponse($bug->toArray(), Response::HTTP_OK);
    }
}
