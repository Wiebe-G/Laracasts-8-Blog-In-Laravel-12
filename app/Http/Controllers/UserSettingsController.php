<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function update(Request $request)
    {
		$request->validate([
			'username' => 'required|max:255',
			'name'=> 'required|max:255',
			'email' => 'required|email|max:255',
			'password' => 'current_password',
			'new_password' => 'required|min:8|confirmed',
		]);

		$user = Auth::user();

		if(!Hash::check($request->password, $user->password)){
			return back()->withErrors(['current_password', 'Huidige wachtwoord is incorrent']);
		}

		if(Hash::check($request->new_password, $user->password)){
			return back()->withErrors(['new_password', 'Nieuwe wachtwoord mag niet huidige wachtwoord zijn.']);
		}

		$user->username = $request->username;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->new_password);
		$user->save();
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
