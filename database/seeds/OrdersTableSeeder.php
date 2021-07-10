<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create( [
            'customer_name'=>'ciao',
            'customer_last_name'=>'Ciao',
            'customer_email'=>'ciao@gmail.com',
            'customers_phone'=>'3336668899',
            'customer_address'=>'via ciao 22',
            'date'=>'021-07-09 10:39:21',
            'scheduled_delivery' => '021-07-09 10:39:21',
            'tot' => '22.50',
        ]);
    }
}
