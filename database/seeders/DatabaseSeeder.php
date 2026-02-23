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

		Category::create([
			'name' => 'Persoonlijk',
			'slug' => 'personal',
			'created_at' => now(),
		]);

		Category::create([
			'name' => 'Hobby',
			'slug' => 'hobby',
			'created_at' => now(),
		]);

		Category::create([
			'name' => 'Werk',
			'slug' => 'work',
			'created_at' => now(),
		]);

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

		Post::create([
			'user_id' => 1,
			'category_id' => 1,
			'slug'=> 'eerste-post',
			'title' => 'Eerste post',
			'thumbnail' => 'thumbnails/roalbUxJtxksIO5vu0mVnTtQgpBEg7iaAEqF9aZo.png',
			'excerpt' => 'Death minions',
			'body' => 'It goes it goes it goes it goes GUILLOTINE',
			'published' => '1',
			'likes'=> '0',
			'views_count' => '0',
			'created_at' => now(),
			'published_at' => now(),
		]);

		Post::create([
			'user_id' => 1,
			'category_id' => 2,
			'slug'=> 'ready-or-not',
			'title' => 'Ready or not',
			'thumbnail' => 'thumbnails/4T8jpIP1TiHiLEVcmVkdd9gc7sF4dZXnLGxfzZDj.png',
			'excerpt' => 'Grenate',
			'body' => 'Goede tactiek',
			'published' => '1',
			'likes'=> '0',
			'views_count' => '0',
			'created_at' => now(),
			'published_at' => now(),
		]);
	}
}
