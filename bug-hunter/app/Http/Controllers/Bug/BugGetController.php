<?php
declare(strict_types=1);

namespace App\Http\Controllers\Bug;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Bug\BugRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class BugGetController extends Controller
{
    private BugRepositoryInterface $bugRepository;

    public function __construct(
        BugRepositoryInterface $bugRepository
    ) {
        $this->bugRepository = $bugRepository;
    }

    public function getBugs(): JsonResponse
    {
        $bugs = $this->bugRepository->getBugs();

        return new JsonResponse($bugs->toArray(), Response::HTTP_OK);
    }
}
