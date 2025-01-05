<?php
declare(strict_types=1);

namespace Tests\Feature\Controller\Bug;

use App\Constants\Bug\BugSeverityEnum;
use App\Constants\Bug\BugStatusEnum;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\ModelFactoryTrait;

final class BugCreateControllerTest extends TestCase
{
    use RefreshDatabase, ModelFactoryTrait;

    private const URI = 'bugs';
    public function testBugCreationIsSuccessful(): void
    {
        $category = $this->createCategory('back end');

        $data = [
            'title' => 'name space issues',
            'description' => ['test this one'],
            'severity' => BugSeverityEnum::LOW(),
            'status' => BugStatusEnum::CLOSED(),
            'raised_at' => (new DateTime('2023-10-10 10:10:00'))->format('Y-m-d H:i:s')
        ];

        $uri = \sprintf('%s/%s', self::URI);

        $response = $this->json('POST', $uri, $data);

        $this->assertDatabaseHas('bugs', [
            'title' => 'name space issues',
            'description' => \json_encode(['test this one']),
            'severity' => 'low',
            'status' => 'closed',
            'raised_at' => '2023-10-10 10:10:00'
        ]);
    }
}