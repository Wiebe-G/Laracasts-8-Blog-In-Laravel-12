<?php

use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'HomePage'])->name('home');

Route::get('posts/{post}', [PageController::class, 'PostsPage'])->name('posts');

Route::get('categories/{category:slug}', [PageController::class, 'CategoryPage'])->name('category');

Route::get('authors/{author:username}', [PageController::class, 'AuthorPage']);