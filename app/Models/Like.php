<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['create_by', 'post_id','is_like'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
