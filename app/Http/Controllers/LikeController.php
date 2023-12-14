<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
class LikeController extends Controller
{
    public function likePost(Request $request, Post $post)
    {
        // Check if the user has already liked the post
        if ($this->isUserLiked($post)) {
            return response()->json(['message' => 'You have already liked this post.'], 422);
        }

        // Create a new like for the post
        $like = new Like();
        $like->user_id = auth()->id();
        $post->likes()->save($like);

        return response()->json(['message' => 'Post liked successfully.']);
    }

    public function likeComment(Request $request, Comment $comment)
    {
        // Check if the user has already liked the comment
        if ($this->isUserLiked($comment)) {
            return response()->json(['message' => 'You have already liked this comment.'], 422);
        }

        // Create a new like for the comment
        $like = new Like();
        $like->user_id = auth()->id();
        $comment->likes()->save($like);

        return response()->json(['message' => 'Comment liked successfully.']);
    }

    // Helper method to check if the user has already liked the given item (post or comment)
    private function isUserLiked($item)
    {
        return $item->likes()->where('user_id', auth()->id())->exists();
    }
}

