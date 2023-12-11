<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::factory()->count(50)->create();

        $user = new User;

        $user->name = "Luca-admin";
        $user->email = "luca.khatri@gmail.com";
        $user->password = "Password!";
        $user->role = 'admin';

        $user->save();
    }
}
