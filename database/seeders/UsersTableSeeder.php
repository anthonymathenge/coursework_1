<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $u=new Profile;
        $u->name = "John Doe"
        $u->email = "John@gmail.com"
        $u->password = "password"
        $u->save();

    }
}
