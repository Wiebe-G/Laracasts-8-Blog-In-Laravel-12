<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CommentController extends Controller
{
	use AuthorizesRequests;
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
    public function store(Post $post)
    {
        request()->validate([
			'body' => ['required']
		]);

		$post->comments()->create([
			'user_id' => auth()->id(),
			'body' => request('body')
		]);

		return back()->with('success', 'Comment geplaatst');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

		return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

		$validated = $request->validate([
			'body' => ['required', 'string', 'max:255']
		]);

		$comment->update($validated);

		return redirect('/')->with('success', 'Comment bewerkt');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
		try {
			$this->authorize('delete', $comment);
		} catch (AuthorizationException $e) {
			abort(Response::HTTP_UNAUTHORIZED);
		}

		$comment->delete();

		$maxId = DB::table('comments')->max('id') + 1;
		DB::statement("ALTER TABLE comments AUTO_INCREMENT = $maxId;");

		return back()->with('success', 'Comment verwijderd');
    }
}
