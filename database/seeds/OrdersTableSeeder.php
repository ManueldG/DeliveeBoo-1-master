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
        for ($i = 0; $i < 5; $i++) {

            $new_order = new Order();

            $new_order->customer_name = 'Customer name' . ($i + 1);
            $new_order->customer_last_name = 'Customer last name' . ($i + 1);
            $new_order->customer_email = 'lorem@email.com';
            $new_order->customer_phone = '123456789';
            $new_order->customer_address = 'via del customer';
            $new_order->tot = 99.99;

            $new_order->save();

        }
    }
}
