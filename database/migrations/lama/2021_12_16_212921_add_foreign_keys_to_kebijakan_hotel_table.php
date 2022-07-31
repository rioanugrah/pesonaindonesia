<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKebijakanHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kebijakan_hotel', function (Blueprint $table) {
            $table->foreign(['hotel_id'])->references(['id'])->on('hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kebijakan_hotel', function (Blueprint $table) {
            $table->dropForeign('kebijakan_hotel_hotel_id_foreign');
        });
    }
}
