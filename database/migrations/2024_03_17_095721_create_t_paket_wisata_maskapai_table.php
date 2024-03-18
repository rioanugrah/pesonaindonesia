<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPaketWisataMaskapaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_paket_wisata_maskapai', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('t_paket_wisata_id');
            $table->string('nama_maskapai')->nullable();
            $table->string('no_penerbangan')->nullable();
            $table->string('arah')->nullable();
            $table->dateTime('jam_berangkat')->nullable();
            $table->text('remaks')->nullable();
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
        Schema::dropIfExists('t_paket_wisata_maskapai');
    }
}
