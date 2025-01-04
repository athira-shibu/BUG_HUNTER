<?php
declare(strict_types=1);

namespace App\Repositories\Interfaces\Bug;

use App\DataTransferObjects\Bug\BugCreateDto;
use App\Models\Bug\Bug;
use App\Models\Category\Category;

interface BugRepositoryInterface
{
    public function create(BugCreateDto $createDto, Category $category): Bug;
}