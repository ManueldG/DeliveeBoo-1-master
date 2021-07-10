<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {

            $table->id();
            $table->string('name',50)->nullable(false);
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('address',50)->nullable(false);
            $table->string('city',50)->nullable(false);
            $table->string('cap',5)->nullable(false);
            $table->string('phone_number',20)->nullable(false);
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
        Schema::dropIfExists('restaurants');
    }
}
