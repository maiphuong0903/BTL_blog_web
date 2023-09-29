<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPostDetail(int $post_id) 
    {
        $post = Post::find($post_id);
        // dd($post->toArray());
        return view('client.pages.detail', compact('post'));
    }
}
