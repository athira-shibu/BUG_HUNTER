<?php
declare(strict_types=1);

namespace Tests\Integration\Repositories\Bug;

use App\Constants\Bug\BugSeverityEnum;
use App\Constants\Bug\BugStatusEnum;
use App\DataTransferObjects\Bug\BugCreateDto;
use App\Repositories\Bug\BugRepository;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\ModelFactoryTrait;

class BugRepositoryTest extends TestCase
{
    use RefreshDatabase, ModelFactoryTrait;

    public function testCreateBugIsSuccessful(): void
    {
        $createDto = new BugCreateDto(
            'name space issue',
            'some random description',
            BugSeverityEnum::CRITICAL(),
            BugStatusEnum::OPEN(),
            new DateTime('2023-10-10T10:10:00Z')
        );

        $category = $this->createCategory('back end');

        $repository = new BugRepository();

        $repository->create($createDto, $category);

        $this->assertDatabaseHas('bugs', [
            'title' => 'name space issue',
            'description' => \json_encode(['some random description']),
            'severity' => 'critical',
            'status' => 'open'
        ]);
    }

    public function testBugGetIsSuccessful(): void
    {
        $category = $this->createCategory();
        $bug1 = $this->createBug($category);
        $bug2 = $this->createBug($category);
        $bug3 = $this->createBug($category);

        $repository = new BugRepository();

        $result = $repository->getBugs();

        $expected = [
            $bug1->toArray(),
            $bug2->toArray(),
            $bug3->toArray()
        ];

        self::assertEquals($expected, $result->toArray());
    }

    public function testFindOneByIdIsSuccessful(): void
    {
        $category = $this->createCategory();
        $bug = $this->createBug($category);

        $repository = new BugRepository();

        $result = $repository->findOneById($bug->getAttribute('id'));

        $expected = $bug->toArray();

        self::assertEquals($expected, $result->toArray());
    }
}