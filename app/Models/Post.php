<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutorial_id',
        'title',
        'content',
        'created_by',
        'tag_id',
        'image',
        'status'
    ];

    protected $with = ['author'];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }   

    public function tutorial(): BelongsTo
    {
        return $this->belongsTo(Tutorial::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getCreatedAtAttribute($value)
    {
        return  Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return  Carbon::parse($value)->format('d-m-Y');
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
