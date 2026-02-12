<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
	use HasFactory;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'user_id' => User::factory(),
			'category_id' => Category::factory(),
			'title' => $this->faker->sentence(),
			'slug' => $this->faker->slug(),
//            'excerpt' => '<p>'.implode('</p><p>', $this->faker->paragraphs(2)).'</p>',
			'excerpt' => $this->faker->text(),
//            'body' => '<p>'.implode('</p><p>', $this->faker->paragraphs(6)).'</p>',
			'body' => $this->faker->paragraphs(5, true),
			'thumbnail' => 'thumbnails/KEMhv4MKKSxmuBFDjNYOO0fSM0EJlj5jRwV3KXuP.png',
			'published' => true
		];
	}
}
