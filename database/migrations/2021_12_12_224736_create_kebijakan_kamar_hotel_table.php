<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKebijakanKamarHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebijakan_kamar_hotel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kamar_hotel_id')->unsigned();
            $table->string('judul_kebijakan_kamar');
            $table->text('deskripsi_kebijakan_kamar');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kamar_hotel_id')->references(['id'])->on('kamar_hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kebijakan_kamar_hotel');
    }
}
