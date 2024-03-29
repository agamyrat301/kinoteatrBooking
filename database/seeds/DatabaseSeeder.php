<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(SpotsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(fivedSpotsTableSeeder::class);
    }
}
