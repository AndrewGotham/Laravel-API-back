<?php

use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\Api\V1\AuthorController;
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

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(
    [
        'middleware' => 'auth:sanctum'
    ],
    function() {
        // Articles
        Route::apiResource('/articles', ArticleController::class);
        // Authors
        Route::get('/authors/{user}', [AuthorController::class, 'show'])->name('authors');
        // Users
        Route::get('user', AuthorController::class);
    }
);
