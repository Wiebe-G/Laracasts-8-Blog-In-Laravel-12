<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $users = User::factory(15)->create();

        $users->each(function ($user) {
            Post::factory(5)->create([
                'user_id'=>$user->id
            ]); 
        });
    }
}
