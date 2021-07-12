<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('restaurants',function (Blueprint $table){

            $table->unsignedBigInteger('user_id')->nullable()->after('id');
<<<<<<< HEAD
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
=======
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

>>>>>>> 5ae2526435a260fbfea0150516e3b2c2e37ad6f3
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('restaurants',function (Blueprint $table){

            $table->dropForeign('restaurants_user_id_foreign');
            $table->dropColumn('user_id');

        });
    }
}
