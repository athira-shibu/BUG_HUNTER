<?php
declare(strict_types=1);

namespace Tests\Integration\Repositories\Category;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\ModelFactoryTrait;

final class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase, ModelFactoryTrait;

    public function testCategoryCreationIsSuccessful(): void
    {
        $repository = new CategoryRepository();

        $repository->create('back end');

        $this->assertDatabaseHas('categories', [
            'name' => 'back end'
        ]);
    }

    public function testFindOneByIdIsSuccessful(): void
    {
        $category = $this->createCategory();

        $repository = new CategoryRepository();

        $repository->findOneById($category->id);

        $expected = $category->toArray();

        self::assertEquals($expected, $category->toArray());
    }

    public function testGetCategoryIsSuccessful(): void
    {
        $category1 = $this->createCategory();
        $category2 = $this->createCategory();
        $category3 = $this->createCategory();

        $repository = new CategoryRepository();

        $result = $repository->getCategory();

        $expected = [
            $category1->toArray(),
            $category2->toArray(),
            $category3->toArray()
        ];

        self::assertEquals($expected, $result->toArray());
    }
}
