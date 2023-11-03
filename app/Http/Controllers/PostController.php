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

    public function getPosts(){
        $posts = Post::take(10)->get();
        return view('client.pages.posts',compact('posts'));
    }
}
