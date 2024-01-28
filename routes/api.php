<?php

use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\PollController;
use App\Http\Controllers\Api\V1\PollOptionController;
use App\Http\Controllers\Api\V1\StoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=> 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
  Route::apiResource('authors', AuthorController::class);
  Route::apiResource('comments', CommentController::class);
  Route::apiResource('stories', StoryController::class);
  Route::apiResource('polls', PollController::class);
  Route::apiResource('polloptions', PollOptionController::class);
});
