<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageKamarHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_kamar_hotel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kamar_hotel_id')->unsigned();
            $table->string('image');
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
        Schema::dropIfExists('image_kamar_hotel');
    }
}
