<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class BookmarkController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
		$user = auth()->user();
		if($user == null){
			abort(Response::HTTP_UNAUTHORIZED);
		}
		$posts = Post::with('users')->paginate(10);
        return view('user-settings.bookmarks.show', [
			'posts' => $posts
		]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post)
    {
		$user = auth()->user();
		if($user == null){
			abort(Response::HTTP_UNAUTHORIZED);
		}
		$user->bookmarkedPosts()->attach($post->id);

        return back()->with('success', 'Bookmark toegevoegd');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $user = auth()->user();
		if($user == null){
			abort(Response::HTTP_UNAUTHORIZED);
		}

		$user->bookmarkedPosts()->toggle($post->id);

		$maxId = DB::table('post_user')->max('id') + 1;
		DB::statement("ALTER TABLE post_user AUTO_INCREMENT = $maxId;");

		return back()->with('success', 'Bookmark verwijderd');
    }
}
