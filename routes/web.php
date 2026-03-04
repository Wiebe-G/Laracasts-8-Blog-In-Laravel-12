<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserSettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'HomePage'])
	->name('home');

Route::get('/posts/{post:slug}', [PageController::class, 'PostsPage'])
	->name('posts.show');

Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])
	->name('comments.store');

// auth routes
Route::get('register', [RegisterController::class, 'create'])
	->name('register');
Route::post('register', [RegisterController::class, 'store'])
	->name('register.store');

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
	Route::get('admin/posts/create', [AdminController::class, 'create'])
		->name('admin.posts.create');
	Route::post('admin/posts/', [AdminController::class, 'store'])
		->name('admin.posts.store');
	Route::get('admin/posts', [\App\Http\Controllers\AdminController::class, 'show'])
		->name('admin.posts.show');
	Route::get('admin/posts/{post:id}/edit', [AdminController::class, 'edit'])
		->name('admin.posts.edit');
	Route::patch('admin/posts/{post:id}', [AdminController::class, 'update'])
		->name('admin.posts.update');
	Route::delete('admin/posts/{post:id}', [AdminController::class, 'destroy'])
		->name('admin.posts.destroy');
	Route::get('admin/users/show', [AdminController::class, 'index'])
		->name('admin.users.show');

	Route::get('/admin/feedback', [AdminController::class, 'feedback'])
		->name('admin.feedback.show');
	Route::get('/admin/feedback/{feedback:id}', [AdminController::class, 'showFeedback'])
		->name('admin.feedback.showOne');
	Route::post('/admin/feedback/{feedback:id}', [AdminController::class, 'storeFeedback'])
		->name('admin.feedback.store');
});

Route::middleware('auth')->group(function () {
	// feedback versturen
	Route::get('/feedback', [FeedbackController::class, 'index'])
		->name('feedback');
	Route::post('/feedback', [FeedbackController::class, 'store'])
		->name('feedback.submit');

	// eigen feedback zien
	Route::get('/settings/feedback', [UserSettingsController::class, 'feedback'])
		->name('user.settings.feedback');
	Route::get('/settings/feedback/{feedback:id}', [UserSettingsController::class, 'showFeedback'])
		->name('user.settings.showFeedback');

	// bookmarks
	Route::post('/bookmark/{post:id}', [BookmarkController::class, 'update'])
		->name('bookmark.update');
	Route::get('/settings/bookmarks', [BookmarkController::class, 'show'])
		->name('user.bookmarks');
	Route::delete('/settings/bookmarks/{post:id}', [BookmarkController::class, 'destroy'])
		->name('user.bookmarks.destroy');

	// likes
	Route::post('/like/{post:id}', [LikesController::class, 'update'])
		->name('like.update');
	Route::get('/settings/likes', [LikesController::class, 'show'])
		->name('user.likes');
	Route::delete('/settings/likes/{post:id}', [LikesController::class, 'destroy'])
		->name('like.destroy');

	// user settings
	Route::get('/settings/details', [UsersettingsController::class, 'show'])
		->name('user.settings');
	Route::post('/settings/details/update', [UsersettingsController::class, 'update'])
		->name('user.settings.update');
	Route::delete('/settings/details/{user:id}', [UsersettingsController::class, 'destroy'])
		->name('user.settings.destroy');

	// Comments aanpassen
	Route::get('/comments/{comment:id}/edit', [CommentController::class, 'edit'])
		->name('comments.edit');
	Route::put('/comments/{comment:id}', [CommentController::class, 'update'])
		->name('comments.update');
	Route::delete('/comments/{comment:id}', [CommentController::class, 'destroy'])
		->name('comments.destroy');

	// Volgen
	Route::post('/follow/user/{user:id}', [FollowController::class, 'store'])
		->name('follow.store');
	Route::delete('/unfollow/user/{user:id}', [FollowController::class, 'destroy'])
		->name('follow.destroy');
	Route::get('/settings/notifications', [UsersettingsController::class, 'notifications'])
		->name('notifications.show');
});

Route::get('/profile/{user:username}', [ProfileController::class, 'show'])
	->name('profile.show');
Route::get('/profile/{user:username}/posts', [ProfileController::class, 'posts'])
	->name('profile.posts');
Route::get('/profile/{user:username}/comments', [ProfileController::class, 'comments'])
	->name('profile.comments');
