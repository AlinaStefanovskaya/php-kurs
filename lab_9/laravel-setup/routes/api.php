<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // Необходимо для использования Request
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Здесь вы можете регистрировать маршруты для вашего API. Эти маршруты
| загружаются RouteServiceProvider и автоматически используют
| пространство имен "api".
|
*/

Route::apiResource('authors', AuthorController::class);
Route::apiResource('genres', GenreController::class);
Route::apiResource('books', BookController::class);
Route::get('/test', function () {
    return 'API работает!';
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
