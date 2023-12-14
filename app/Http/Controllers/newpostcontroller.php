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
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust validation rules as needed

        ]);

        $imagePath = time() . '-' . $request->title . '.' . $request->image->Extension();
        $request->image->move(public_path('storage'), $imagePath );


        // Create a new post
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image_url = 'storage/' . $imagePath; // Store the image path in 'image_url'

        $post->user_id = auth()->id(); // Associate the post with the authenticated user

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
}
