<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutorial_id',
        'title',
        'content',
        'created_by'
    ];

    protected $with = ['author'];

    public function tutorial(): BelongsTo
    {
        return $this->belongsTo(Tutorial::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
