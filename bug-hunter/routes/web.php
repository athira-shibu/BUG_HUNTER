<?php

use App\Http\Controllers\Bug\BugCreateController;
use App\Http\Controllers\Category\CategoryCreateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
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
    Route::post('/{id}', [BugCreateController::class, 'create']);
});
