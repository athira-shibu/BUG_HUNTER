<?php
declare(strict_types=1);

namespace Tests\Integration\Repositories\Category;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCategoryCreationIsSuccessful(): void
    {
        $repository = new CategoryRepository();

        $repository->create('back end');

        $this->assertDatabaseHas('categories', [
            'name' => 'back end'
        ]);
    }
}
