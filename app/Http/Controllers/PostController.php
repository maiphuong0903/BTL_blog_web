<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.pages.posts.index');
    }

    public function create()
    {
        return view('admin.pages.posts.create');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->storeAs('public/post_images', $fileName);

            $url = asset('storage/post_images/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function store(Request $request)
    {
        dd($request);
    }


    public function getPostDetail(int $post_id)
    {
        $post = Post::find($post_id);
        // dd($post->toArray());
        return view('client.pages.detail', compact('post'));
    }

    public function getPosts()
    {
        $posts = Post::take(10)->get();
        return view('client.pages.posts', compact('posts'));
    }
}
