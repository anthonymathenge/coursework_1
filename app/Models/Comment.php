<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function posts(){
        return $this->belongsTo(Post::class);
    }
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
