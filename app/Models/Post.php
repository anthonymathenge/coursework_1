<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content','image_url'];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    // Post.php
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function isLikedByAuthUser()
    {
        $authUserId = auth()->id();

        if ($authUserId) {
            return $this->likes()->where('user_id', $authUserId)->exists();
        }

        return false;
    }

}
