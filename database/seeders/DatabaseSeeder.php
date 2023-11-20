<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create(['name' => "Ahmed Ali C1", 'username' => "con1", 'role' => "CONTROL1", "password"=>bcrypt("123"),]);
        User::create(['name' => "Samir Radi C2", 'username' => "con2", 'role' => "CONTROL2", "password"=>bcrypt("123"),]);
        User::create(['name' => "Admin Admin", 'username' => "admin", 'role' => "ADMIN", "password"=>bcrypt("123"),]);
        User::create(['name' => "User User", 'username' => "user", 'role' => "USER", "password"=>bcrypt("123"),]);

    }
}
