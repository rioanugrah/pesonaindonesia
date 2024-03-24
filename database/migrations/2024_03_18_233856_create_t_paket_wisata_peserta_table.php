<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPaketWisataPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_paket_wisata_peserta', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('t_paket_wisata_id');
            $table->string('nama_peserta')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
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
        Schema::dropIfExists('t_paket_wisata_peserta');
    }
}
