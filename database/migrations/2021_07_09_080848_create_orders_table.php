<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            $table->string('customer_name',30)->nullable(false);
            $table->string('customer_last_name',30)->nullable(false);
            $table->string('customer_email',50)->nullable(false);
            $table->string('customer_phone',15)->nullable(false);
            $table->string('customer_address',30)->nullable(false);
            $table->float('tot',6,2)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
