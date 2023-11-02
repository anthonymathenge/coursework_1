<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $c = new Comment;
        $c->profile_id = 1;
        $c->post_id = 1;
        $c->text= "This is a sample comment";
        $c->save();


    }
}
