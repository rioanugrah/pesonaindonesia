<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiTiketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasi_tiket', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('transaction_id')->nullable();
            $table->string('kode_tiket')->nullable();
            $table->date('tanggal_booking')->nullable();
            $table->string('nama_tiket')->nullable();
            $table->string('nama_order')->nullable();
            // $table->integer('qty')->nullable();
            // $table->string('price')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('verifikasi_tiket_list', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('verifikasi_tiket_id')->nullable();
            $table->string('nama_order')->nullable();
            // $table->text('alamat')->nullable();
            // $table->string('email')->nullable();
            // $table->string('phone')->nullable();
            $table->integer('qty')->nullable();
            // $table->string('price')->nullable();
            // $table->string('status')->nullable();
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
        Schema::dropIfExists('verifikasi_tiket');
        Schema::dropIfExists('verifikasi_tiket_list');
    }
}
