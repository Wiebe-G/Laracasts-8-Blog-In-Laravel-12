<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PageController extends Controller
{
    public function HomePage()
    {
        return view('home', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )
                ->paginate()->withQueryString(),
        ]);
    }

    public function PostsPage(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }

    public function CategoryPage(Category $category)
    {
        return view('home', [
            'posts' => $category->posts,
            'currentCategory' => $category,
            'categories' => Category::all(),
        ]);
    }

    public function AuthorPage(User $author)
    {
        return view('home', [
            'posts' => $author->posts,
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
        ]);
    }
}
