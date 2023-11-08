<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'created_by',
        'post_id',
        'reply_comment',
    ];

    protected $with = ['viewer'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function viewer()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
