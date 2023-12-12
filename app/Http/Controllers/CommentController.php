<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Fetch authenticated user's profile
            $user = auth()->user();

            // Check if the profile is not null
            if ($user) {
                // Fetch user's comments and any other necessary data
                $comments = $user->comments; // Make sure 'comments' is the correct relationship name

                return view('comments', compact('comments'));
            }
        }

        // Redirect to login if the user is not authenticated
        return redirect()->route('login');
    }

    public function store(Request $request, Post $post)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();

        // Associate the comment with the post
        $post->comments()->save($comment);

        return response()->json(['message' => 'Comment added successfully.']);
    }
}



