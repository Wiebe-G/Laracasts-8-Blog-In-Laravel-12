<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'HomePage'])->name('home');

Route::get('/posts/{post:slug}', [PageController::class, 'PostsPage'])->name('posts');

Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');

// auth routes
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

// Uitlogen
Route::post('/logout', LogoutController::class)
    ->middleware('auth')
    ->name('logout');

// Inlog
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('login', LoginController::class)
    ->middleware('guest')
    ->name('login');
