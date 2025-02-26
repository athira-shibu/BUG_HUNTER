<?php
declare(strict_types=1);

namespace App\Repositories\Interfaces\Bug;

use App\DataTransferObjects\Bug\BugCreateDto;
use App\DataTransferObjects\Bug\BugUpdateDto;
use App\Models\Bug\Bug;
use App\Models\Category\Category;
use Illuminate\Support\Collection;

interface BugRepositoryInterface
{
    public function create(BugCreateDto $createDto, Category $category): Bug;

    public function getBugs(): Collection;

    public function findOneById(string $id): ?Bug;

    public function update(Bug $bug, BugUpdateDto $updateDto, ?Category $category = null): Bug;
}