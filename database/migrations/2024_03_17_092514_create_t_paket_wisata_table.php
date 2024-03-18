<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPaketWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_paket_wisata', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode')->nullable();
            $table->string('nama_keberangkatan')->nullable();
            $table->string('jenis_tujuan')->nullable();
            $table->string('tujuan_wisata')->nullable();
            $table->string('jenis_keberangkatan')->nullable();
            $table->text('tour_leader')->nullable();
            $table->text('objek_wisata')->nullable();
            $table->dateTime('waktu_keberangkatan')->nullable();
            $table->string('durasi_wisata')->nullable();
            $table->string('kuota_peserta',10)->nullable();
            $table->text('remaks')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('t_paket_wisata');
    }
}
