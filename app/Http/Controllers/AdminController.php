<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackReply;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('admin.users.index', [
			'users' => User::all()
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store()
	{
		$attributes = array_merge($this->validatePost(), [
			'user_id' => auth()->id(),
			'thumbnail' => request()->file('thumbnail')->store('thumbnails', 'public'),
		]);

		Post::create($attributes);

		return redirect()->route('home')->with('success', 'Post is aangemaakt!');
	}

	/**
	 * Display the specified resource.
	 */
	public function show()
	{
		$sortedPosts = Post::orderby('created_at', 'desc')->paginate(15);
		return view('admin.posts.index', [
			'posts' => $sortedPosts,
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Post $post)
	{
		return view('admin.posts.edit', ['post' => $post]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Post $post)
	{
		$attributes = $this->validatePost($post);
		if ($attributes['thumbnail'] ?? false) {
			$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
		}

		$post->update($attributes);

		return back()->with('success', 'Post bewerkt!');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Post $post)
	{
		$post->delete();
		return back()->with('success', 'Post verwijderd!');
	}

	protected function validatePost(?Post $post = null): array
	{
		$post ??= new Post();

		return request()->validate([
			'title' => 'required',
			'thumbnail' => $post->exists ? ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:512000'] : ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:512000'],
			'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
			'excerpt' => 'required',
			'body' => 'required',
			'category_id' => ['required', Rule::exists('categories', 'id')],
			'user_id' => ['sometimes', Rule::exists('users', 'id')],
			'published' => ['required', 'boolean'],
		]);
	}

	public function feedback()
	{
		return view('admin.feedback.index', [
			'feedback' => Feedback::all()
		]);
	}

	public function showFeedback(Feedback $feedback)
	{
		$hasReply = DB::table('feedback_reply')->where('feedback_id', $feedback->id)->first();
		$replyUser = FeedbackReply::with('user')->first();
		return view('admin.feedback.show', [
			'feedback' => $feedback,
			'hasReply' => $hasReply,
			'replyUser' => $replyUser
		]);
	}

	public function storeFeedback(Feedback $feedback)
	{
		$attributes = request()->validate([
			'message' => ['required', 'string', 'max:255']
		]);

		$attributes['feedback_id'] = $feedback->id;
		$attributes['user_id'] = auth()->id();

		FeedbackReply::create($attributes);

		return back()->with('success', 'Reactie is aangemaakt!');
	}
}
