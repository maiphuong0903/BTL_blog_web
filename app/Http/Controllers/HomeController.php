<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Psr7\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('client.pages.home', compact('posts'));
    }
}
