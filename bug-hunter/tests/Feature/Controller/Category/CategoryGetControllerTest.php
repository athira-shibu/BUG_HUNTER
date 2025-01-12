<?php
declare(strict_types=1);

namespace Tests\Feature\Controller\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\ModelFactoryTrait;

final class CategoryGetControllerTest extends TestCase
{
    use RefreshDatabase, ModelFactoryTrait;

    private const URI = 'api/categories';

    public function testCategoryGetIsSuccessful(): void
    {
        $category1 = $this->createCategory();
        $category2 = $this->createCategory();
        $category3 = $this->createCategory();

        $expected = [
            $category1->toArray(),
            $category2->toArray(),
            $category3->toArray()
        ];

        $response = $this->json('GET', self::URI);

        self::assertEqualsCanonicalizing($expected, $response->json());
    }
}