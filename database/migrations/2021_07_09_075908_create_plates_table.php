<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();

            $table->string('name',50)->nullable(false);
            $table->text('description')->nullable();
            $table->boolean('visibility')->nullable(false);
            $table->float('price',4,2)->nullable(false);
            $table->string('image')->nullable();
            $table->string('ingredients')->nullable();






            $table->timestamps();
        });

        /*Schema::table('plates', function ($table){
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plates');
    }
}
