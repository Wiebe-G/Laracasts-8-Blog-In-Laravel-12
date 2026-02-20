<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserInformation;
use Illuminate\Http\Request;
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
		$user = $request->user();

		if (Hash::check($request->new_password, $user->password)) {
			return back()->withErrors([
				'new_password' => 'Nieuwe wachtwoord mag niet huidige wachtwoord zijn.'
			]);
		}

		$data = $request->only(['username', 'name', 'avatar', 'email', 'bio']);

		if ($request->filled('new_password')) {
			$data['password'] = Hash::make($request->new_password);
		}

		if($request->filled('avatar')){
			$data['avatar'] = request()->file('avatar')->store('avatars', 'public');
		} else{
			$data['avatar'] = $user->avatar;
		}


		$user->update($data);

		return back()->with('success', 'Gegevens bijgewerkt');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
