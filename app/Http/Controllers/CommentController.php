<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;


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

        // In your CommentController's store method after creating a new comment        
        return response()->json(['message' => 'Comment added successfully.']);
    }

    public function destroy(Comment $comment)
{
    // Check if the authenticated user is the owner of the comment
    if ($comment->user_id == auth()->id() || auth()->id() == 12345) {
        // Delete the comment
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    return redirect()->back()->with('error', 'Unauthorized action.');
}

public function edit(Comment $comment)
{
    // Check if the authenticated user is the owner of the comment
    if ($comment->user_id == auth()->id() || auth()->id() == 12345) {
        return view('commentedit', compact('comment'));
    }

    return redirect()->back()->with('error', 'Unauthorized action.');
}

public function update(Request $request, Comment $comment)
{
    // Check if the authenticated user is the owner of the comment
    if ($comment->user_id == auth()->id() || auth()->id() == 12345) {
        $request->validate([
            'content' => 'required',
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Comment updated successfully.');
    }

    return redirect()->back()->with('error', 'Unauthorized action.');
}


}



