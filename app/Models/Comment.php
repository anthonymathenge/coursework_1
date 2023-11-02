<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    public function profiles(){
        return $this->belongsTo(Profile::class);
    }
    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
