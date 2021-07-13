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

        $types = [
            'italiano',
            'giapponese',
            'cinese',
            'greco',
            'messicano',
            'indiano',
            'pizza'
        ];

        foreach($types as $type) {

            $new_cuisine = new Cuisine();

            $new_cuisine->type = $type;

            $new_cuisine->save();
        }




    }
}
