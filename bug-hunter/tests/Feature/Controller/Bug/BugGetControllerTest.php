<?php
declare(strict_types=1);

namespace Tests\Feature\Controller\Bug;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\ModelFactoryTrait;

/**
 * @covers \App\Http\Controllers\Bug\BugGetController
 */
final class BugGetControllerTest extends TestCase
{
    use RefreshDatabase, ModelFactoryTrait;

    private const URI = 'api/bugs';

    public function testGetBugsIsSuccessful(): void
    {
        $category = $this->createCategory();
        $bug1 = $this->createBug($category);
        $bug2 = $this->createBug($category);
        $bug3 = $this->createBug($category);

        $expected = [
            $bug1->toArray(),
            $bug2->toArray(),
            $bug3->toArray()
        ];

        $response = $this->json('GET', self::URI);

        self::assertEqualsCanonicalizing($expected, $response->json());
    }
}
