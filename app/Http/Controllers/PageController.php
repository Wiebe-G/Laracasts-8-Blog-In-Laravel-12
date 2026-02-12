<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public function HomePage()
    {
        return view('posts.home', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )
                ->paginate(10)->withQueryString(),
        ]);
    }

    public function PostsPage(Post $post)
    {
        return view('posts.post', [
            'post' => $post,
        ]);
    }

    public function CategoryPage(Category $category)
    {
        return view('posts.home', [
            'posts' => $category->posts,
            'currentCategory' => $category,
            'categories' => Category::all(),
        ]);
    }

    public function AuthorPage(User $author)
    {
        return view('posts.home', [
            'posts' => $author->posts,
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
        ]);
    }
}
