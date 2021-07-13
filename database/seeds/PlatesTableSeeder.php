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
        for ($i = 0; $i < 5; $i++) {

            $new_plate = new Plate();

            $new_plate->name = 'Piatto prova ' . ($i + 1);
            $new_plate->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, alias fuga. Dolorem nisi placeat ab nam provident, accusamus, quibusdam debitis laboriosam numquam, porro adipisci sapiente animi tempora? Minus, in pariatur.';
            $new_plate->visibility = true;
            $new_plate->price = 20.00;
            $new_plate->image = '';
            

            $new_plate->save();

        }
    }
}
