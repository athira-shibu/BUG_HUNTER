<?php
declare(strict_types=1);

namespace Tests\Feature\Controller\Bug;

use App\Constants\Bug\BugSeverityEnum;
use App\Constants\Bug\BugStatusEnum;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\ModelFactoryTrait;

/**
 * @covers \App\Http\Controllers\Bug\BugUpdateController
 */
final class BugUpdateControllerTest extends TestCase
{
    use RefreshDatabase, ModelFactoryTrait;

    private const URI = 'bugs';

    public function testUpdateBugIsSuccessful(): void
    {
        $category1 = $this->createCategory();
        $category2 = $this->createCategory();

        $data = [
            'title' => 'name space issues',
            'description' => ['test this one'],
            'severity' => BugSeverityEnum::LOW(),
            'status' => BugStatusEnum::CLOSED(),
            'raised_at' => (new DateTime('2023-10-10 10:10:00'))->format('Y-m-d H:i:s')
        ];

        $bug = $this->createBug(
            $category1,
            'test bug',
            'test desc',
            BugSeverityEnum::CRITICAL(),
            BugStatusEnum::CLOSED(),
            'bug solution',
            new DateTime('2023-10-10 10:10:00')
        );

        $uri = \sprintf('%s/%s', self::URI, $bug->getAttribute('id'));

        $response = $this->json('PUT', $uri, $data);

        $this->assertDatabaseHas('bugs', [
            'title' => 'name space issues',
            'description' => \json_encode(['test this one']),
            'severity' => 'low',
            'status' => 'closed',
            'raised_at' => '2023-10-10 10:10:00'
        ]);
    }
}