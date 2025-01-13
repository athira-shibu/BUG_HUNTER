<?php
declare(strict_types=1);

namespace Tests\Feature\Controller\Bug;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Tests\Traits\ModelFactoryTrait;

final class BugFindControllerTest extends TestCase
{
    use RefreshDatabase, ModelFactoryTrait;

    private const URI = 'bugs';

    public function testFindBugIsSuccessful(): void
    {
        $category = $this->createCategory();
        $bug = $this->createBug($category);

        $uri = \sprintf('%s/%s', self::URI, $bug->getAttribute('id'));

        $response = $this->json('GET', $uri);
// dd($response);
        $expected = $bug->toArray();

        $response->assertStatus(Response::HTTP_OK)
            ->assertExactJson($expected);
    }
}