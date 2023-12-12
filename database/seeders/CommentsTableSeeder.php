<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Comment;


class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $comment  = new Comment;
        $comment ->user_id = 1;
        $comment->post_id = 1;
        $comment->content= "This is a sample comment";
        $comment->save();

        Comment::factory(10)->create();


    }
}
