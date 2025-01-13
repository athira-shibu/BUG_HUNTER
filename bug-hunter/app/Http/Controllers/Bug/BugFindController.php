<?php
declare(strict_types=1);

namespace App\Http\Controllers\Bug;

use App\Exceptions\Bug\BugNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Bug\Bug;
use App\Repositories\Interfaces\Bug\BugRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class BugFindController extends Controller
{
    private BugRepositoryInterface $bugRepository;

    public function __construct(
        BugRepositoryInterface $bugRepository
    ) {
        $this->bugRepository = $bugRepository;
    }

    public function find(string $id): JsonResponse
    {
        dd($id);
        $bug = $this->bugRepository->findOneById($id);
// dd($bug);
        if ($bug instanceof Bug === false) {
            throw new BugNotFoundException(\sprintf('Bug for id - %s not found.', $id));
        }

        return new JsonResponse($bug->toArray(), Response::HTTP_OK);
    }
}
