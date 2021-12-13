<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasPopulerKamarHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_populer_kamar_hotel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kamar_hotel_id')->unsigned();
            $table->string('fasilitas_kamar_popiler');
            $table->string('fasilitas_kamar_popiler_detail');
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
        Schema::dropIfExists('fasilitas_populer_kamar_hotel');
    }
}
