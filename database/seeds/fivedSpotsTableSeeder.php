<?php

use Illuminate\Database\Seeder;

class fivedSpotsTableSeeder extends Seeder
{
      public function run()
    {
        for ($x = 1;$x<=7;$x++) {
            \App\Spot::create([
                'number'=>'A'.$x,
                'zal'=>'5d'
            ]);
        }

        for ($i = 1;$i<=7;$i++) {
            \App\Spot::create([
                'number'=>'B'.$i,
                'zal'=>'5d'
            ]);
        }

        for ($y = 1;$y<=7;$y++) {
            \App\Spot::create([
                'number'=>'C'.$y,
                'zal'=>'5d'
            ]);
        }

        for ($z = 1;$z<=7;$z++) {
            \App\Spot::create([
                'number'=>'D'.$z,
                'zal'=>'5d'
            ]);
        }

    }
}
