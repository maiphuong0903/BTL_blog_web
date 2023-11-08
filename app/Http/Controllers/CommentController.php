<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $post_id){      
        if (Auth::check()) {
            $comment = Comment::create([
                'comment' => $request->input('comment'),
                'post_id' => $post_id,
            ]);
            $comment->save();
            //dd($comment);
            return redirect()->route('client.post.detail', $post_id);

        } else {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để bình luận.');
        }
    }
}
