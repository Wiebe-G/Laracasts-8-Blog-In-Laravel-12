<?php

namespace App\Http\Controllers;

use App\Models\Post;
use File;
use Illuminate\Http\Request;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;

class PageController extends Controller
{


    public function HomePage()
    {
        $posts = collect(File::files(resource_path("posts")))
            ->map(function ($file){
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function($document){
                return new Post(
                    $document->title,
                    $document->date,
                    $document->body(),
                    $document->slug,
                    $document->excerpt
                );
            });

        return view('home', [
            'posts'=> Post::all()
        ]);
    }
}
