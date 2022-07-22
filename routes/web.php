<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// TESTING DEVELOPMENT
Route::get('/modelTesting', [TestingController::class, 'modelTesting']);
Route::get('/controllerTesting', [TestingController::class, 'controllerTesting']);
Route::get('/loopTesting', [TestingController::class, 'loopTesting']);

// FORBIDDEN
Route::view('/not-admin', 'forbidden.not_admin');
Route::view('/admin-cannot-order','forbidden.admin_cannot_order');

// HOME
Route::get('/', [HomeController::class, 'index']);
Route::get('/book/{book}', [HomeController::class, 'show']);

/* Book details page is separated based on user */

// AUTHENTICATED Users (admin & Member)
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/registerAjax', [AuthController::class, 'storeAjax']);
Route::get('/profile', [AuthController::class, 'changeProfile']);
Route::post('/profile', [AuthController::class, 'updateProfile']);
Route::get('/profile/password', [AuthController::class, 'changePassword'])->name('change_password');
Route::post('/profile/password', [AuthController::class, 'updatePassword'])->name('update_password');
Route::post('/logout', [AuthController::class, 'logout']);

// MIDDLEWARE GROUP FOR ADMIN
// VALIDATE ONLY ADMIN
Route::middleware([\App\Http\Middleware\AdminCheck::class])->group(function (){
    // ADMIN BOOK
    Route::get('/admin/book', [AdminController::class, 'manageBook']);
    Route::post('/admin/book', [AdminController::class, 'insertBook']);
    Route::get('/book/{book}/admin', [AdminController::class, 'bookDetail']);
    Route::post('/book/{book}/admin', [AdminController::class, 'updateBook']);
    Route::delete('/book/{book}/admin', [AdminController::class, 'deleteBook']);

    // ADMIN GENRE
    Route::get('/admin/genre', [AdminController::class, 'manageGenre']);
    Route::post('/admin/genre', [AdminController::class, 'addGenre']);
    Route::get('/genre/{genre}/admin', [AdminController::class, 'genreDetail']);
    Route::post('/genre/{genre}/admin', [AdminController::class, 'updateGenre']);
    Route::delete('/genre/{genre}/admin', [AdminController::class, 'deleteGenre']);

    // ADMIN USER
    Route::get('/admin/user', [AdminController::class, 'manageUser']);
    Route::get('/user/{user}/admin', [AdminController::class, 'userDetail']);
    Route::post('/user/{user}/admin', [AdminController::class, 'updateUser']);
    Route::delete('/user/{user}/admin', [AdminController::class, 'deleteUser']);
});

// MIDDLEWARE GROUP FOR MEMBER
// VALIDATE ONLY MEMBER
Route::middleware([\App\Http\Middleware\MemberCheck::class])->group(function () {

    Route::get('/cart', [OrderController::class, 'index']);
    Route::get('/cart/{book:id}', [HomeController::class, 'show']);
    Route::post('/cart/{book:id}', [OrderController::class, 'update']);
    Route::post('/cart/r/{book:id}', [OrderController::class, 'destroy']);
    Route::post('/checkout', [OrderController::class, 'store']);
    Route::get('/history', [OrderController::class, 'create']);
    Route::get('/history/{receipt:id}', [OrderController::class, 'show']);
});
