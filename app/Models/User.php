<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    // User.php
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'likeable_id')->where('likeable_type', Post::class);
    }

    public function likedComments()
    {
        return $this->belongsToMany(Comment::class, 'likes', 'user_id', 'likeable_id')->where('likeable_type', Comment::class);
    }
    public function unreadnotifications()
{
    return $this->hasMany(Notification::class);
}


}
