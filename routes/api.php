<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts', [PostsController::class, 'retrieveAll']);
Route::get('/posts/{post_id}', [PostsController::class, 'retrieveOne']);
Route::get('/posts/{post_id}/comments', [CommentsController::class, 'retrieveAll']);
Route::post('/posts/{post_id}/comments', [CommentsController::class, 'store']);
