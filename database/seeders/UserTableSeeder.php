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
        $user=new User;
        $user->name = "John Doe";
        $user->email = "John@gmail.com";
        $user->avatarUrl = "https://robohash.org/{name}.png";
        $user->password = bcrypt("password");
        $user->save();

        $u=new User;
        $u->name = "ken jeong";
        $u->email = "ken@gmail.com";
        $u->avatarUrl = "https://robohash.org/%6Bname%6D.png";
        $u->password = bcrypt("password");
        $u->save();

        $u=new User;
        $u->id = 12345;
        $u->name = "root";
        $u->email = "root@gmail.com";
        $u->password = bcrypt("root");
        $u->save();

    }

}
