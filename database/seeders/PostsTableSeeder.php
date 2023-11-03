<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $p=new Post;
        $p->profile_id = 1;
        $p->title = "Sample Post";
        $p->content = "this is Sample Post content";
        $p->save();

        Post::factory(6)->create();


    }
}
