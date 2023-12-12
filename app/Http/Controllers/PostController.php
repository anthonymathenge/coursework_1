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

    public function create()
    {
        // Display the form for creating new posts
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = auth()->id(); // Associate the post with the authenticated user

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    public function destroy(Post $post){
    // Check if the authenticated user is the owner of the post
    if ($post->user_id == auth()->id()) {
        // Delete the post and its associated comments
        $post->comments()->delete();
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post and comments deleted successfully.');
    }

    return redirect()->back()->with('error', 'Unauthorized action.');
}

}

