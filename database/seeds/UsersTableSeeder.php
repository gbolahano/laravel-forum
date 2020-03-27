<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'admin',
            'admin' => 1,
            'email' => 'gbolahanolawuyi4u@gmail.com',
            'password' => bcrypt('password'),
            'avatar' => 'uploads/avatars/1.jpg'
        ]);

        \App\User::create([
            'name' => 'Emily Meyers',
            'email' => 'emily@meyers.com',
            'password' => bcrypt('password'),
            'avatar' => 'uploads/avatars/1.jpg'
        ]);
    }
}
