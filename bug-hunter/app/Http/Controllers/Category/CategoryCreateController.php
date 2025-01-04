<?php
declare(strict_types=1);

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryCreateController extends Controller
{
    public function create(): JsonResponse
    {
        return new JsonResponse();
    }
}
