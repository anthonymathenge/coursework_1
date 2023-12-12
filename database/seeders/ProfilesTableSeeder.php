<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $u=new Profile;
        $u->name = "John Do";
        $u->email = "John@gmail.com";
        $u->password = bcrypt("password");
        $u->save();

    }
}
