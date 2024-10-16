<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Auth\RegisterController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('gifs/search', [\App\Http\Controllers\GifController::class, 'searchGifs']);
    Route::get('gif/{id}', [\App\Http\Controllers\GifController::class, 'getGifById']);
    Route::post('favorites', [\App\Http\Controllers\GifController::class, 'StoreFavoriteGif']);
});
