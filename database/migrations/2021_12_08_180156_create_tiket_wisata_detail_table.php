<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketWisataDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket_wisata_detail', function (Blueprint $table) {
            $table->string('kode_tiket', 100)->primary();
            $table->unsignedBigInteger('tiket_wisata_id')->index('tiket_wisata_detail_tiket_wisata_id_foreign');
            $table->date('start_date');
            $table->date('end_date');
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
