<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, User $user)
    {
        return back()->with('success', 'Post geliket!');
    }
}
