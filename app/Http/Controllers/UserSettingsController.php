<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserInformation;
use App\Models\Feedback;
use App\Models\FeedbackReply;
use App\Models\Post;
use App\Models\PostNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserSettingsController extends Controller
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
		return view('user-settings.credentials.index');
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
	public function update(UpdateUserInformation $request)
	{
		$user = auth()->user();

		if (Hash::check($request->new_password, $user->password)) {
			return back()->withErrors([
				'new_password' => 'Nieuwe wachtwoord mag niet huidige wachtwoord zijn.'
			]);
		}

		$data = $request->only(['username', 'name', 'email', 'bio']);

		if ($request->filled('new_password')) {
			$data['password'] = Hash::make($request->new_password);
		}

		if ($request->hasFile('avatar')) {
			$data['avatar'] = request()->file('avatar')->store('avatars', 'public');
		} else {
			$data['avatar'] = $user->avatar;
		}

		$user->update($data);

		return back()->with('success', 'Gegevens bijgewerkt');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user)
	{
		if ($user == null) {
			abort(Response::HTTP_UNAUTHORIZED);
		}

		$user->delete();

		return redirect('/')->with('success', 'Gegevens verwijderd. Ik hoop dat dat opzettelijk was');
	}

	public function feedback()
	{
		$user = Auth::user();
		$userFeedback = Feedback::where('user_id', $user->id)->paginate();
		return view('user-settings.feedback.index', [
			'user' => $user,
			'userFeedback' => $userFeedback
		]);
	}

	public function showFeedback(Feedback $feedback)
	{
		$feedback->load('reply.user');
		return view('user-settings.feedback.show', compact('feedback'));
	}

	public function notifications()
	{
		$user = Auth::user();
		$notifications = PostNotification::where('user_id', $user->id)->paginate();
		$posts = [];
		$i = 0;
		foreach($notifications as $notification) {
			$post = Post::where('id', $notification->post_id)->first();
			$posts[$i] = $post;
			$i++;
		}
		return view('user-settings.notifications.index', [
			'notifications' => $notifications,
			'posts' => $posts
		]);
	}

	public function following()
	{
		$user = Auth::user();
		$followees = $user->followees()->get();
		return view('user-settings.notifications.following', [
			'followees' => $followees
		]);
	}
}
