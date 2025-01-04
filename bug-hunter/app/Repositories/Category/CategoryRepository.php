<?php
declare(strict_types=1);

namespace App\Repositories\Category;

use App\Models\Category\Category;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;

final class CategoryRepository implements CategoryRepositoryInterface
{
    public function create(string $name): Category
    {
        $category = new Category();

        $category->setAttribute('name', $name);
        $category->save();

        return $category;
    }
}