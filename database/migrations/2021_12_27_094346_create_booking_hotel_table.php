<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_hotel', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking', 255);
            $table->bigInteger('hotel_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->double('total');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign(['hotel_id'])->references(['id'])->on('hotel');
            $table->foreign(['user_id'])->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_hotel');
    }
}
