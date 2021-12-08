<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TiketWisataDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket_wisata_detail', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->string('kode_tiket', 100)->primary();
            $table->bigInteger('tiket_wisata_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->foreign('tiket_wisata_id')->references('id')->on('tiket_wisata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket_wisata_detail');
    }
}
