<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_hotel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hotel_id')->unsigned();
            $table->bigInteger('kamar_hotel_id')->unsigned();
            $table->integer('jumlah_kamar');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign(['hotel_id'])->references(['id'])->on('hotel');
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
        Schema::dropIfExists('room_hotel');
    }
}
