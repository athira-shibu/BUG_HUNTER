<?php

use App\Http\Controllers\Bug\BugCreateController;
use App\Http\Controllers\Category\CategoryCreateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'categories',
    'as' => 'categories.'
], static function () {
    Route::post('/', [CategoryCreateController::class, 'create']);
});

Route::group([
    'prefix' => 'bugs',
    'as' => 'bugs.'
], static function () {
    Route::post('/', [BugCreateController::class, 'create']);
});
