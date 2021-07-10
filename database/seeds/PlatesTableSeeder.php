<?php

use App\Plate;
use Illuminate\Database\Seeder;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plate::create( [
            'name'=>'ciao',
            'description'=>'Ciao',
            'visibility'=>'0',
            'price'=>'20',
            'image'=>'via ciao 22',
            'ingredients'=>'ciao',
        ]);
    }
}
