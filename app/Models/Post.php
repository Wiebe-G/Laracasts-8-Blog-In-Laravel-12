<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use HasFactory;

	//

	protected $fillable = [
		'user_id',
		'category_id',
		'slug',
		'title',
		'thumbnail',
		'excerpt',
		'body',
		'published',
		'likes',
		'views_count'
	];

	protected $with = [
		'category', 'author',
	];

	public function scopeFilter($query, array $filters)
	{
		$query
			->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query->where('title', 'like', '%' . $search . '%')
				->orWhere('body', 'like', '%' . $search . '%'))
			);

		$query
			->when($filters['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category))
			);

		$query
			->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author))
			);
	}

	public function scopeSort($query, $sort)
	{
		if ($sort == 'popular') {
			return $query->withCount('likes')
				->orderBy('likes_count', 'desc');
		}
		return $query->orderByRaw("GREATEST(created_at, updated_at)" . ($sort === 'desc' ? 'asc' : 'desc'));
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function author()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function likes()
	{
		return $this->belongsToMany(User::class, 'post_user_liked');
	}

	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	public function isBookmarkedBy($user): bool
	{
		return $this->bookmarkedBy()->where('user_id', $user->id)->exists();

	}

	public function bookmarkedBy()
	{
		return $this->belongsToMany(User::class, 'post_user');
	}

	public function LikedBy()
	{
		return $this->belongsToMany(User::class, 'post_user_liked', 'post_id', 'user_id');
	}

	public function isLikedBy($user): bool
	{
		return $this->LikedBy()->where('user_id', $user->id)->exists();
	}
}
