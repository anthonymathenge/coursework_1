<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class LikeSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        // Generate random likes for comments
        Comment::all()->each(function ($comment) use ($users) {
            // Decide the number of likes for each comment (you can adjust this)
            $numberOfLikes = rand(1, count($users));

            // Attach random users as likes to the comment
            foreach ($users->random($numberOfLikes) as $user) {
                $comment->likes()->create(['user_id' => $user->id]);
            }
        });

        // Generate random likes for posts
        Post::all()->each(function ($post) use ($users) {
            // Decide the number of likes for each post (you can adjust this)
            $numberOfLikes = rand(1, count($users));

            // Attach random users as likes to the post
            foreach ($users->random($numberOfLikes) as $user) {
                $post->likes()->create(['user_id' => $user->id]);
            }
        });
    }
}


