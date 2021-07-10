<?php

use App\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::create( [
            'name'=>'ciao',
            'description'=>'Ciao',
            'image'=>'https://i.picsum.photos/id/35/200/300.jpg?hmac=No1hMogzX_PUqgWDfLRCc4wGPYTIeviBhJbzjqskoMA',
            'address'=>'via dalle fratte 69',
            'city'=>'Rome',
            'cap'=>'00144',
            'phone_number' => '066878528',


        ]);
    }
}


