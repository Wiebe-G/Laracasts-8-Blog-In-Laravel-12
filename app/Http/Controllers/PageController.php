<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
	public function HomePage(Request $request)
	{
		$posts = Post::query()
			->where('published', true)
			->filter($request->only(['search', 'category', 'author']))
			->sort($request->input('sort', 'asc'))
			->paginate(10)
			->withQueryString();

		return view('posts.home', [
			'posts' => $posts,
		]);
	}

	public function PostsPage(Post $post)
	{
		// timestamps uitzetten zodat de view niet de post updated_at vernieuwt
		$post->timestamps = false;
		$post->increment('views_count');
		$post->timestamps = true;
		return view('posts.post', [
			'post' => $post,
		]);
	}
}
