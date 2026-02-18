<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
	use WithoutModelEvents;

	/**
	 * Seed the application's database.
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		User::truncate();
		Post::truncate();
		Comment::truncate();
		Category::truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		User::create([
			'username' => 'wiebe',
			'name' => 'wiebe',
			'email' => 'wiebe@datasculpt.nl',
			'password' => Hash::make('wachtwoord'),
			'avatar' => 'avatars/DXHoX9nr1PnjhZ4iKyPs0Ri3i5vZhW2I30T5H9xC.png',
			'is_admin' => 1
		]);

		User::create([
			'username' => 'test',
			'name' => 'test',
			'email' => 'test@test.com',
			'password' => Hash::make('wachtwoord'),
			'avatar' => 'avatars/qF2O8qAheDOQ3TIym746lwmVhT3I17xegHvs9pUv.png',
			'is_admin' => 0
		]);

		Category::factory(5)->create();

		User::factory(3)->create();

		Post::factory(5)->create();

//		Post::factory(5)->create();

//		$users = User::factory(5)->create();
//
//		$users->each(function ($user) {
//			Post::factory(3)->create([
//				'user_id' => $user->id,
//			]);
//		});
	}
}
