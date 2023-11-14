<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Tutorial;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::join('users','posts.created_by','=','users.id')
                ->where('role', 1)
                ->paginate(8);

        return view('admin.pages.posts.index', compact('posts'));
    }


    public function getPostDetail($post_id)
    {
        $post = Post::find($post_id);
        $comments = $post->comments->whereNull("reply_comment");
        foreach($comments as $comment) {
            $comment->reply = [];
            $reply =  Comment::where('reply_comment', $comment->id)->get();
            if($reply)  $comment->reply = $reply;
        }
        $tags = $post->tags;
        $relatedPosts = Post::whereHas('tutorial', function ($query) use ($post) {
            $query->where('tutorial_id', $post->tutorial_id);
        })
        ->where('id', '!=', $post_id) 
        ->limit(3)
        ->get();
    
        return view('client.pages.detail', compact('post','tags','comments','relatedPosts'));
    }

    public function getPosts()
    {
        $posts = Post::paginate(12); 
        $tags = Tag::take(10)->get();
        return view('client.pages.posts', compact('posts', 'tags'));
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'title.required' => 'Tên không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'content.string' => 'Nội dung phải là một chuỗi',
            'image.required' => 'Bắt buộc chọn 1 hình ảnh',
            'image.image' => 'Hình ảnh phải là một hình ảnh',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif',
            'image.max' => 'Hình ảnh không được vượt quá 2048 KB',
        ]);

        $data = [
            "tutorial_id" => $request->get('tutorial_id'),
            "title" => $request->get('title'),
            "content" => $request->get('content'),
            "created_by" => auth()->user()->id,
            "status" => 1,
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


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'title.required' => 'Tên không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'content.string' => 'Nội dung phải là một chuỗi',
            'image.required' => 'Bắt buộc chọn 1 hình ảnh',
            'image.image' => 'Hình ảnh phải là một hình ảnh',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif',
            'image.max' => 'Hình ảnh không được vượt quá 2048 KB',
        ]);

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

    // lấy ra danh sách bài viết người dùng đăng
    public function getPost(){
        $posts = Post::join('users','posts.created_by','=','users.id')
                ->select('posts.id', 'posts.title', 'posts.image', 'posts.created_at', 'users.name')
                ->where('role', 0)
                ->where('status', 0) 
                ->paginate(8);
        // dd($posts);
        return view('admin.pages.posts.post',compact('posts'));
    }

    public function post_approve(){
        $posts = Post::join('users', 'posts.created_by', '=', 'users.id')
                ->select('posts.id', 'posts.title', 'posts.image', 'posts.created_at', 'users.name')
                ->where('role', 0)
                ->where('status', 1) 
                ->paginate(8);
        return view('admin.pages.posts.post_approved',compact('posts'));
    }

    //status -> 0: chờ duyệt , 1:đã được duyệt, 2:đã bị hủy
    public function approve($postId){
        $post = Post::find($postId); 

        $post->update(['status' => 1]);
    }

    public function refuse($postId){
        $post = Post::find($postId); 

        $post->update(['status' => 2]);
    }

    //show thông tin bài viết
    public function show($id){
        $post = Post::find($id);
        return view('admin.pages.posts.show',compact('post'));
    }
}
