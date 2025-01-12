<?php
declare(strict_types=1);

namespace App\Http\Controllers\Bug;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Bug\BugRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class BugUpdateController extends Controller
{
    private BugRepositoryInterface $bugRepository;

    public function __construct(
        BugRepositoryInterface $bugRepository
    ) {
        $this->bugRepository = $bugRepository;
    }

    public function update(string $id): JsonResponse
    {
        $bug = $this->bugRepository->
    }
}