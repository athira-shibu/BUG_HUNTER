<?php
declare(strict_types=1);

namespace App\Http\Controllers\Bug;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class BugCreateController extends Controller
{
    public function create(): JsonResponse
    {
        return new JsonResponse();
    }
}