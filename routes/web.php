<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/', [LoginController::class, 'login']);


Route::middleware('auth')->group(function () {
    Route::get('/statistics', [StatisticsController::class, 'index']);
    Route::get('/posts', [PostsController::class, 'index']);
    Route::get('/posts/{slug}/delete', [PostsController::class, 'delete']);

    Route::get('/media', [MediaController::class, 'index']);
    Route::post('/media', [MediaController::class, 'upload']);
    Route::get('/media/delete/{path}', [MediaController::class, 'delete']);

    Route::get('/feed-back', [FeedbackController::class, 'index']);
    Route::get('/feed-back/{id}/delete', [FeedbackController::class, 'delete']);
});
