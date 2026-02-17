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
		$sort = $request->input('sort', 'asc');

//		switch ($sort) {
//			case 'asc':
//				$posts = Post::latest()->filter(request(['search', 'category', 'author']))->where('published', true)->paginate(10)->withQueryString();
//				break;
//			case 'desc':
//				$posts = Post::oldest()->filter(request(['search', 'category', 'author']))->where('published', true)->paginate(10)->withQueryString();
//				break;
//			default:
//				break;
//		};

		$direction = $sort === 'desc' ? 'asc' : 'desc';

		$posts = Post::query()
			->orderBy('created_at', $direction)
			->filter(request(['search', 'category', 'author']))
			->where('published', true)
			->paginate(10)
			->withQueryString();

		return view('posts.home', [
			'posts' => $posts
		]);
	}

	public function PostsPage(Post $post)
	{
		return view('posts.post', [
			'post' => $post,
		]);
	}
}
