<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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

// admin routes
Route::middleware('admin')->group(function () {
	Route::get('admin/posts/create', [AdminController::class, 'create']);
	Route::post('admin/posts/', [AdminController::class, 'store']);
	Route::get('admin/posts', [\App\Http\Controllers\AdminController::class, 'show']);
	Route::get('admin/posts/{post:id}/edit', [AdminController::class, 'edit']);
	Route::patch('admin/posts/{post:id}', [AdminController::class, 'update']);
	Route::delete('admin/posts/{post:id}', [AdminController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
	// bookmarks
	Route::post('/bookmark/{post:id}', [BookmarkController::class, 'update'])->name('bookmark.update');
	Route::get('/user/settings/bookmarks', [BookmarkController::class, 'show'])->name('user.bookmarks');
	Route::delete('user/settings/bookmarks/{post:id}', [BookmarkController::class, 'destroy'])->name('user.bookmarks.destroy');

	// likes
	Route::post('/like/{post:id}', [LikesController::class, 'update'])->name('like.update');

	// user settings
	Route::get('/user/settings', Usercontroller::class)->name('user.settings');
});
