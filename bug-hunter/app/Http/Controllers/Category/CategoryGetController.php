<?php
declare(strict_types=1);

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CategoryGetController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories(): JsonResponse
    {
        return new JsonResponse();
    }
}
