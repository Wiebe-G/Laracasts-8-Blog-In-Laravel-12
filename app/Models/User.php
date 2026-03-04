<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	/** @use HasFactory<\Database\Factories\UserFactory> */
	use HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $fillable = [
		'name',
		'username',
		'email',
		'password',
		'avatar',
		'bio'
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var list<string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
		];
	}

	public function posts()
	{
		return $this->HasMany(Post::class);
	}

	public function bookmarkedPosts()
	{
		return $this->belongsToMany(Post::class);
	}

	public function likes()
	{
		return $this->belongsToMany(Post::class, 'post_user_liked');
	}

	public function comments()
	{
		return $this->hasmany(Comment::class);
	}

	public function followers()
	{
		return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'author_id');
	}

	public function followees()
	{
		return $this->belongsToMany(User::class, 'user_follow', 'author_id', 'user_id');
	}
}
