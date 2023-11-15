<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $postInMonth = Post::where('status', 1)->count();
    $totalUsers = User::count();
    $totalComments = Comment::count();
    $totalLikes = Like::where('is_like', 1)->count();

    $posts = Post::withCount(['likes', 'comments']) 
            ->where('status', 1) 
            ->orderByDesc('likes_count') 
            ->limit(10)
            ->get();

    return view('admin.pages.home', compact('postInMonth', 'totalUsers', 'totalComments', 'totalLikes', 'posts'));
}

}
