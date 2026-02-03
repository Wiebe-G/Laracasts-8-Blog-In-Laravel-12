<?php

use App\Http\Controllers\PageController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'HomePage']);

Route::get('posts/{post}', function($slug) {
    return view('post', [
        'post'=>Post::find($slug)
    ]);

});