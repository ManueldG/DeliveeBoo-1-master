<?php

use Illuminate\Database\Seeder;
use App\Cuisine;

class CuisinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuisine::create([
            'type'=> 
                'giapponese',
             
        ]);
    }
}
