<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingHotelDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_hotel_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_hotel_id')->unsigned();
            $table->string('no_kamar')->nullable();
            $table->string('nama_kamar');
            $table->double('harga');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign(['booking_hotel_id'])->references(['id'])->on('booking_hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_hotel_detail');
    }
}
