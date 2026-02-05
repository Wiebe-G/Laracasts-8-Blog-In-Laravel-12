<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;

class PageController extends Controller
{
    public function HomePage()
    {
        return view('home', [
            'posts'=> Post::latest()->get(),
            'categories' => Category::all()
        ]);
    }

    public function PostsPage(Post $post)
    {
        return view('post', [
            'post'=>$post
        ]);
    }

    public function CategoryPage (Category $category)
    {
        return view('home', [
        'posts'=>$category->posts,
        'currentCategory' => $category,
        'categories'=>Category::all()
        ]);
    }

    public function AuthorPage(User $author)
    {
        return view('home', [
            'posts'=> $author->posts,
            'categories'=>Category::all()
        ]);
    }
}