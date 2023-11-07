<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Tutorial;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);
        return view('admin.pages.posts.index', compact('posts'));
    }

    public function getPostDetail($post_id)
    {
        $post = Post::find($post_id);
        // dd($post->toArray());
        $tags = $post->tags;
        return view('client.pages.detail', compact('post','tags'));
    }

    public function getPosts()
    {
        $posts = Post::take(10)->get();
        return view('client.pages.posts', compact('posts'));
    }

    public function create()
    {
        $tutorials = Tutorial::all(); 
        $tags = Tag::all();
        return view('admin.pages.posts.create', compact('tutorials' , 'tags'));
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/images');
            $url = Storage::url($path);
            $data['image'] = $url;
        } 
        $post = Post::create($data);
       
        // Xử lý tags đã chọn
        if ($request->has('tags')) {
            $post->tags()->attach($request->input('tags'));
        }

        return redirect()->route('admin.posts.index');
    }


    public function edit($id){
        $post = Post::find($id); 
        $tutorials = Tutorial::all(); 
        $tags = Tag::all();
        return view('admin.pages.posts.update', compact('post', 'tutorials', 'tags'));
    }
    

    public function update(Request $request, $id){
        $post = Post::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/images');
            $url = Storage::url($path);
        } 
        $post->update([
            "tutorial_id" => $request->get('tutorial_id'),
            "title" => $request->get('title'),
            "content" => $request->get('content'),
            "created_by" => auth()->user()->id,
            "image" =>  $url,
        ]);
    
        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags'));
        }
    
        return redirect()->route('admin.posts.index');
    }  
    
    public function destroy($id){
        $post = Post::find($id); 
        $post->delete();
        return back();
    }
}
