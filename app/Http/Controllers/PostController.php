<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Fetch user's posts and any other necessary data
        $posts = auth()->user();

        return view('posts', compact('posts'));
    }
}
