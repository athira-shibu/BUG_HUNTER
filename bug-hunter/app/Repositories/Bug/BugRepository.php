<?php
declare(strict_types=1);

namespace App\Repositories\Bug;

use App\DataTransferObjects\Bug\BugCreateDto;
use App\DataTransferObjects\Bug\BugUpdateDto;
use App\Models\Bug\Bug;
use App\Models\Category\Category;
use App\Repositories\Interfaces\Bug\BugRepositoryInterface;
use Illuminate\Support\Collection;

final class BugRepository implements BugRepositoryInterface
{
    public function create(BugCreateDto $createDto, Category $category): Bug
    {
        $bug = new Bug();

        $bug->setAttribute('title', $createDto->getTitle());
        $bug->setAttribute('description', \json_encode($createDto->getDescription(), JSON_THROW_ON_ERROR));
        $bug->setAttribute('severity', $createDto->getSeverity());
        $bug->setAttribute('status', $createDto->getStatus());
        $bug->setAttribute('raised_at', $createDto->getRaisedAt());
        $bug->setAttribute('solution', $createDto->getSolution());

        $bug->category()->associate($category);

        $bug->save();

        return $bug;
    }

    public function getBugs(): Collection
    {
        return (new Bug())
            ->get();
    }

    public function findOneById(string $id): ?Bug
    {
        return (new Bug())
            ->where('id', '=', $id)
            ->first();
    }

    public function update(Bug $bug, BugUpdateDto $updateDto, ?Category $category = null): Bug
    {
        $bug->setAttribute('title', $updateDto->getTitle());
        $bug->setAttribute('description', $updateDto->getDescription());
        $bug->setAttribute('severity', $updateDto->getSeverity()->getValue());
        $bug->setAttribute('status', $updateDto->getStatus()->getValue());
        $bug->setAttribute('raised_at', $updateDto->getRaisedAt());
        $bug->setAttribute('solution', $updateDto->getSolution());

        if ($category !== null) {
            $bug->category()->associate($category);
        }

        $bug->save();

        return $bug;
    }
}
