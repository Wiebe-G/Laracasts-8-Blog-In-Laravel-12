<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserSettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'HomePage'])->name('home');

Route::get('/posts/{post:slug}', [PageController::class, 'PostsPage'])
	->name('posts.show');

Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])
	->name('comments.store');

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
	Route::get('admin/posts/create', [AdminController::class, 'create'])->name('admin.posts.create');
	Route::post('admin/posts/', [AdminController::class, 'store'])->name('admin.posts.store');
	Route::get('admin/posts', [\App\Http\Controllers\AdminController::class, 'show']);
	Route::get('admin/posts/{post:id}/edit', [AdminController::class, 'edit']);
	Route::patch('admin/posts/{post:id}', [AdminController::class, 'update']);
	Route::delete('admin/posts/{post:id}', [AdminController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
	// bookmarks
	Route::post('/bookmark/{post:id}', [BookmarkController::class, 'update'])->name('bookmark.update');
	Route::get('/settings/bookmarks', [BookmarkController::class, 'show'])->name('user.bookmarks');
	Route::delete('/settings/bookmarks/{post:id}', [BookmarkController::class, 'destroy'])->name('user.bookmarks.destroy');

	// likes
	Route::post('/like/{post:id}', [LikesController::class, 'update'])->name('like.update');
	Route::get('/settings/likes', [LikesController::class, 'show'])->name('user.likes');
	Route::delete('/settings/likes/{post:id}', [LikesController::class, 'destroy'])->name('like.destroy');

	// user settings
	Route::get('/settings/details', [UsersettingsController::class, 'show'])->name('user.settings');
	Route::post('/settings/details/update', [UsersettingsController::class, 'update'])->name('user.settings.update');

	// Comments aanpassen
	Route::get('/comments/{comment:id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
	Route::put('/comments/{comment:id}', [CommentController::class, 'update'])->name('comments.update');
	Route::delete('/comments/{comment:id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
