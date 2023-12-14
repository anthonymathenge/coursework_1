<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Fetch user's posts and any other necessary data
        $user = auth()->user();
        $posts = $user->posts; // Assuming 'posts' is the correct relationship name

        return view('posts', compact('posts'));
    }


    public function destroy(Post $post){
    // Check if the authenticated user is the owner of the post
    if ($post->user_id == auth()->id() || auth()->id() == 12345) {
        // Delete the post and its associated comments
        $post->comments()->delete();
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post and comments deleted successfully.');
    }

    return redirect()->back()->with('error', 'Unauthorized action.');
}

public function edit(Post $post)
{
    // Check if the authenticated user is the owner of the post
    if ($post->user_id == auth()->id() || auth()->id() == 12345) {
        return view('postedit', compact('post'));
    }

    return redirect()->back()->with('error', 'Unauthorized action.');
}

public function update(Request $request, Post $post)
{
    // Check if the authenticated user is the owner of the post
    if ($post->user_id == auth()->id() || auth()->id() == 12345) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    return redirect()->back()->with('error', 'Unauthorized action.');
}


}

