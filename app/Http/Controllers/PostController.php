<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.pages.posts.index', compact('posts'));
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

        $data = [
            "tutorial_id" => $request->get('tutorial_id'),
            "title" => $request->get('title'),
            "content" => $request->get('content'),
            "created_by" => auth()->user()->id,
        ];

        Post::create($data);

        return redirect()->route('admin.posts.index');
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
