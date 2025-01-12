<?php
declare(strict_types=1);

namespace App\Repositories\Category;

use App\Models\Category\Category;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

final class CategoryRepository implements CategoryRepositoryInterface
{
    public function create(string $name): Category
    {
        $category = new Category();

        $category->setAttribute('name', $name);
        $category->save();

        return $category;
    }

    public function findOneById(int $id): ?Category
    {
        return (new Category())
            ->where('id', '=', $id)
            ->first();
    }

    public function getCategory(): Collection
    {
        return (new Category())
            ->get();
    }
}