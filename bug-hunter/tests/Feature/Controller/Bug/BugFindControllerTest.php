<?php
declare(strict_types=1);

namespace Tests\Feature\Controller\Bug;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Tests\Traits\ModelFactoryTrait;

/**
 * @covers \App\Http\Controllers\Bug\BugFindController
 */
final class BugFindControllerTest extends TestCase
{
    use RefreshDatabase, ModelFactoryTrait, WithoutMiddleware;

    private const URI = 'bugs';

    public function testFindBugIsSuccessful(): void
    {
        $category = $this->createCategory();
        $bug = $this->createBug($category);
        $bug->setAttribute('id', 1);
        $bug->save();

        $uri = \sprintf('%s/%s', self::URI, $bug->getAttribute('id'));
// dd($uri);
        $response = $this->json('GET', $uri);
// dd($response);
        $expected = $bug->toArray();
// dd($response);
        $response->assertStatus(Response::HTTP_OK);
            // ->assertExactJson($bug->toArray());

        // $response->assertJsonFragment($expected);
    }
}