<?php
declare(strict_types=1);

namespace App\Http\Controllers\Bug;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bug\BugCreateRequest;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class BugCreateController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(BugCreateRequest $request, string $id): JsonResponse
    {
        $category = $this->categoryRepository->
        return new JsonResponse();
    }
}