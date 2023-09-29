<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::take(10)->get();
        return view('client.pages.home', compact('posts'));
    }
}
