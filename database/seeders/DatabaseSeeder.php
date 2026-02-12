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
			'is_admin' => 1
		]);

		Category::factory(5)->create();

		Post::factory(5)->create();

//		$users = User::factory(5)->create();
//
//		$users->each(function ($user) {
//			Post::factory(3)->create([
//				'user_id' => $user->id,
//			]);
//		});
	}
}
