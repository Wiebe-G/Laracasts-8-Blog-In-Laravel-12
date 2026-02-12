<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
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

		return redirect('/')->with('success', 'Post is aangemaakt!');
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
			'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
			'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
			'excerpt' => 'required',
			'body' => 'required',
			'category_id' => ['required', Rule::exists('categories', 'id')],
			'published' => ['required', 'boolean'],
		]);
	}
}
