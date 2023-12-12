<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated

            // Fetch authenticated user's profile
            $user = auth()->user();

            // Check if the profile is not null
                // Fetch user's comments and any other necessary data
                $comments = $user->comments; // Make sure 'comments' is the correct relationship name

                return view('comments', compact('comments'));

        // Redirect to login if the user is not authenticated
    }
}


