<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_list', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('paket_id');
            $table->string('nama_paket');
            $table->integer('jumlah_paket');
            $table->string('price')->nullable();
            $table->integer('diskon')->nullable();
            $table->text('deskripsi');
            $table->string('images');
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
        Schema::dropIfExists('paket_list');
    }
}
