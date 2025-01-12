<?php

namespace App\Repositories\Interfaces\Category;

use App\Models\Category\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function create(string $name): Category;

    public function findOneById(int $id): ?Category;

    public function getCategory(): Collection;
}
