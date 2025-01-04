<?php
declare(strict_types=1);

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CategoryCreateController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(CategoryCreateRequest $request): JsonResponse
    {
        $category = $this->categoryRepository->create($request->get('name'));
    
        return new JsonResponse($category->toArray(), Response::HTTP_CREATED);
    }
}
