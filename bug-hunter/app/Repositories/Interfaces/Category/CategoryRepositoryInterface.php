<?php

namespace App\Repositories\Interfaces\Category;

use App\Models\Category\Category;

interface CategoryRepositoryInterface
{
    public function create(string $name): Category;

    public function findOneById(int $id): ?Category;
}
