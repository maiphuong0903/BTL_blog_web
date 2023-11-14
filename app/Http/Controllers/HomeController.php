<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)
                ->orderBy('created_at', 'desc') 
                ->take(8) 
                ->get();
        return view('client.pages.home', compact('posts'));
    }

    public function search(Request $request)
    {
        $keyWord = $request->get('search_term');
        $posts = Post::where('title', 'LIKE', "%{$keyWord}%")
                ->orWhereHas('tags', function ($query) use ($keyWord) {
                    $query->where('name', 'LIKE', "%{$keyWord}%");
                })
                ->orWhereHas('author', function ($query) use ($keyWord) {
                    $query->where('name', 'LIKE', "%{$keyWord}%");
                })
                ->get();
        return view('client.pages.search', compact(['posts', 'keyWord']));
    }

    public function getByTutorial(int $tutorial_id)
    {
        $tutorial = Tutorial::find($tutorial_id);
        $posts = Post::where('tutorial_id', $tutorial_id)->get();
        return view('client.pages.tutorial', compact(['posts', 'tutorial']));
    }

    // trang thông tin cá nhân
    public function account(){
        $user = auth()->user();
        return view('client.pages.account.index', compact('user'));
    }

    //sửa thông tin cá nhân
    public function edit(){
        $user = auth()->user();
        return view('client.pages.account.update',compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();
        $request->user()->fill($request->validated());
        
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $path = $file->store('public/images');
            $url = Storage::url($path);
            $request->user()->update(['avatar' => $url]);
        } else {
            $request->user()->update($request->validated());
        }        

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

       return view('client.pages.account.index',compact('user'));
    }

    //đổi mật khẩu
    public function pass(){
        return view('client.pages.account.pass');
    }

    public function updatePass(Request $request)
    {
       // Validate the request data
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Update the user's password
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    //xóa tài khoản
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('client.pages.account.index',compact('user'));
    }

    //danh sach bài viết yêu thích
    public function list_like()
    {
        $user = Auth::user();
        $perPage = 8;   
        $likedPosts = Like::where('created_by', $user->id)
            ->with('post')
            ->paginate($perPage);
    
        return view('client.pages.account.list_like', compact('likedPosts'));
    }

    // danh sách bài đăng 
    public function account_post(){
        $user = Auth::user();
        $posts = Post::where('created_by', $user->id)
                ->where('status', '1')
                ->paginate(8);

        return view('client.pages.account.posts.index', compact('posts'));
    }

    public function account_post_pending(){
        $user = Auth::user();
        $posts = Post::where('created_by', $user->id)
                      ->where('status', '0')
                      ->paginate(8);
    
        return view('client.pages.account.posts.list_post_pending', compact('posts'));
    }
    
    public function account_post_refuse(){
        $user = Auth::user();
        $posts = Post::where('created_by', $user->id)
                      ->where('status', '2')
                      ->paginate(8);
    
        return view('client.pages.account.posts.list_post_refuse', compact('posts'));
    }

    //đăng bài 
    public function post_create(){
        $tutorials = Tutorial::all();
        $tags = Tag::all();
        return view('client.pages.account.posts.create', compact('tutorials' , 'tags'));
    }

    public function uploadImage_pots(Request $request)
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

    public function post_store(Request $request)
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
            "status" => 0,
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

        return redirect()->route('client.account.post_pending');
    }
    //sửa bài
    public function post_edit($id){
        $post = Post::find($id);
        $tutorials = Tutorial::all();
        $tags = Tag::all();
        return view('client.pages.account.posts.update', compact('post', 'tutorials', 'tags'));
    }

    public function post_update(Request $request, $id)
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

        return redirect()->route('client.account.post_refuse');
    }

    //đăng lại bài
    public function post_pending($postId){
        $post = Post::find($postId); 

        $post->update(['status' => 0]);
    }
    
    //xóa bài
    public function post_destroy($id){
        $post = Post::find($id);
        $post->delete();
        return back();
    }

    //show thông tin bài viết
    public function show($id){
        $post = Post::find($id);
        return view('client.pages.account.posts.show',compact('post'));
    }

}
