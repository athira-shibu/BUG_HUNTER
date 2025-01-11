<?php
declare(strict_types=1);

namespace Tests\Traits;

use App\Constants\Bug\BugSeverityEnum;
use App\Constants\Bug\BugStatusEnum;
use App\Models\Bug\Bug;
use App\Models\Category\Category;
use DateTime;

trait ModelFactoryTrait
{
    public function createCategory(
        ?string $name = null
    ): Category {
        $category = new Category();

        $category->setAttribute('name', $name ?? 'back end');

        $category->save();

        return $category;
    }

    public function createBug(
        Category $category,
        ?string $title = null,
        ?string $description = null,
        ?BugSeverityEnum $severity = null,
        ?BugStatusEnum $status = null,
        ?string $solution = null,
        ?DateTime $raisedAt = null
    ): Bug {
        $bug = new Bug();

        $bug->setAttribute('title', $title ?? 'test bug');
        $bug->setAttribute('description', $description ?? 'test description');
        $bug->setAttribute('severity', $severity !== null ? $severity->getValue() : 'high');
        $bug->setAttribute('status', $status !== null ? $status->getValue() : 'open');
        $bug->setAttribute('solution', $solution ?? 'should specify the return type');
        $bug->setAttribute('raised_at', $raisedAt ?? new DateTime('2023-10-10T10:10:00Z'));

        $bug->category()->associate($category);

        $bug->save();

        return $bug;
    }
}