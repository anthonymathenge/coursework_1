<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class NewPostController extends Controller
{
    public function create()
    {
        return view('newpost');
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
}
