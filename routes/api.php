<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Получение списка книг с именем автора
Route::get('books', [\App\Http\Controllers\ForRestAPIController::class, 'BooksAndAuthors']);

// Получение описания книг c названием
Route::get('synopsis', [\App\Http\Controllers\ForRestAPIController::class, 'BooksSynopsis']);

// Получение списка авторов
Route::get('authors', [\App\Http\Controllers\ForRestAPIController::class, 'Authors']);

// Получение списка пользователей
Route::get('user', [\App\Http\Controllers\ForRestAPIController::class, 'Users']);
