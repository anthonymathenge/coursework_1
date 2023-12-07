<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u=new User;
        $u->name = "John Doe";
        $u->email = "John@gmail.com";
        $u->password = bcrypt("password");
        $u->save();

    }
}
