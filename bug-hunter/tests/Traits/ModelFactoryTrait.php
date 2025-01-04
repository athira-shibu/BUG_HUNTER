<?php
declare(strict_types=1);

namespace Tests\Traits;

use App\Models\Category\Category;

trait ModelFactoryTrait
{
    public function createCategory(
        ?string $name = null
    ): Category
    {
        $category = new Category();

        $category->setAttribute('name', $name ?? 'back end');

        $category->save();

        return $category;
    }
}