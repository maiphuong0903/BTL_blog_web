<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike($postId)
    {
        // Lấy bài viết từ ID
        $post = Post::find($postId);
        
        // Kiểm tra xem người dùng đã like bài viết hay chưa
        $existingLike = Like::where('post_id', $postId)
                            ->where('created_by', auth()->id())
                            ->first();
    
        // Nếu đã like, thì bỏ like
        if ($existingLike) {
            $existingLike->delete();
            $isLike = false;
        } else {
            // Nếu chưa like, thì tạo mới một bản ghi trong bảng Like
            $newLike = new Like();
            $newLike->post_id = $postId;
            $newLike->created_by = auth()->id();
            $newLike->is_like = true;
            $newLike->save();
            $isLike = true;
        }
    
        // Cập nhật số lượng like trong bảng Post
        $post->update([
            'likes_count' => Like::where('post_id', $postId)->count()
        ]);
    
        // Trả về kết quả
        return response()->json(['is_like' => $isLike, 'likes_count' => $post->likes_count]);
    }
    
}
