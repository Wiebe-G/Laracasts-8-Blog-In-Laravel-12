<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
	public function store()
	{
		$attributes = request()->validate([
			'name' => 'required|max:255',
			'username' => 'required|min:3|max:255', Rule::unique('users', 'username'),
			'email' => 'required|email|max:255|unique:users,email', Rule::unique('users', 'email'),
			'password' => 'required|min:7|max:255',
		]);

		try {
			$user = User::create([
				'name' => $attributes['name'],
				'username' => $attributes['username'],
				'email' => $attributes['email'],
				'password' => Hash::make($attributes['password']),
			]);
		} catch (\Exception $e) {
			return back()->withInput()->withErrors([
				'username' => 'Gebruikersnaam al in gebruik',
				'password' => 'Wachtwoorden komen niet overeen',
				'email' => 'Email incorrect',
			]);
		}

		auth()->login($user);
		return redirect('/')->with('success', 'Uw account is aangemaakt.');
	}

	public function create()
	{
		return view('auth.register');
	}
}
