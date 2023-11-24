<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlesiranMalangTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('plesiran_malang')->create('tour', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug');
            $table->string('nama_tour');
            $table->text('deskripsi');
            $table->string('durasi');
            $table->string('grup',2);
            $table->string('umur');
            $table->string('lokasi');
            $table->date('jam_mulai');
            $table->double('harga');
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
        Schema::dropIfExists('plesiran_malang_tour');
    }
}