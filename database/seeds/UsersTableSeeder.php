<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \App\User::create([
            'name' => 'KinoTeatrAdmin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
        ]);
      
    }
}
