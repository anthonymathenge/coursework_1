<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        // Fetch user's comments and any other necessary data
        $comments = auth()->user();

        return view('comments', compact('comments'));
    }
}
