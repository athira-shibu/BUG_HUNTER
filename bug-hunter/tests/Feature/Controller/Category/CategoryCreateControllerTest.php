<?php
declare(strict_types=1);

namespace Tests\Feature\Controller\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\ModelFactoryTrait;

final class CategoryCreateControllerTest extends TestCase
{
    use RefreshDatabase, ModelFactoryTrait;

    private const URI = 'api/categories';

    public function testCreateCategoryIsSuccessful(): void
    {
        $data = [
            'name' => 'back end'
        ];

        $response = $this->json('POST', self::URI, $data);

        $this->assertDatabaseHas('categories', [
            'name' => 'back end'
        ]);
    }
}