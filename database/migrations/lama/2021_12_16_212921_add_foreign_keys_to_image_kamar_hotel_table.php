<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToImageKamarHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_kamar_hotel', function (Blueprint $table) {
            $table->foreign(['kamar_hotel_id'])->references(['id'])->on('kamar_hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_kamar_hotel', function (Blueprint $table) {
            $table->dropForeign('image_kamar_hotel_kamar_hotel_id_foreign');
        });
    }
}
