<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    public function profiles(){
        return $this->belongsTo(Profile::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
