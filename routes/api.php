<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\StatisticsController;
use App\Http\Middleware\CheckClientTokenApi;
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

Route::prefix('v1')->middleware(CheckClientTokenApi::class)->group(function () {
    Route::get('statistics', [StatisticsController::class, 'get']);
    Route::get('statistics/count', [StatisticsController::class, 'count']);

    Route::get('post/{slug}', [PostsController::class, 'get_stat']);
    Route::get('post/{slug}/likes', [PostsController::class, 'count_likes']);
    Route::get('post/{slug}/views', [PostsController::class, 'count_views']);

    Route::post('feedback', [FeedbackController::class, 'save']);
});
