<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
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
			->paginate(9)
			->withQueryString();

		return view('posts.home', [
			'posts' => $posts,
		]);
	}

	public function PostsPage(Post $post)
	{
		$comments = Comment::where('post_id', $post->id)->paginate(5);
		if ($post->published == false) {
			return back()->with('error' , 'Deze post is niet openbaar');
		}
		$post->loadCount('likedBy');
		$post->loadCount('bookmarkedBy');
		$post->loadCount('comments');
		$key = 'post_' . $post->id . '_viewed';
		if(!session()->has($key)) {
			// timestamps uitzetten zodat de view niet de post updated_at vernieuwt
			$post->timestamps = false;
			$post->increment('views_count');
			$post->timestamps = true;
			session()->put($key, true);
		}

		return view('posts.post', [
			'post' => $post,
			'comments' => $comments,
		]);
	}
}
