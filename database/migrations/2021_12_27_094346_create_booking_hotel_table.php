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
            $table->double('total')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign(['hotel_id'])->references(['id'])->on('hotel');
            $table->foreign(['user_id'])->references(['id'])->on('users');
        });

        Schema::create('booking_hotel_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_hotel_id')->unsigned();
            $table->string('no_kamar')->nullable();
            $table->string('nama_kamar')->nullable();
            $table->integer('jumlah_kamar')->nullable();
            $table->double('harga')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign(['booking_hotel_id'])->references(['id'])->on('booking_hotel');
        });

        Schema::create('pemesanan_hotel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_hotel_detail_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('confirmation_email');
            $table->string('phone');
            $table->string('negara');
            $table->string('alamat_1');
            $table->string('city');
            $table->string('state');
            $table->text('information');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign(['booking_hotel_detail_id'])->references(['id'])->on('booking_hotel_detail');
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
        Schema::dropIfExists('booking_hotel_detail');
    }
}
