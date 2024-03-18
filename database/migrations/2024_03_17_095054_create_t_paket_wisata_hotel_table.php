<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPaketWisataHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_paket_wisata_hotel', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('t_paket_wisata_id');
            $table->string('nama_hotel')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('jumlah_malam',3)->nullable();
            $table->dateTime('check_in')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_paket_wisata_hotel');
    }
}
