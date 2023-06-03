<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_order', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('kode_order');
            $table->string('nama_order');
            $table->date('tanggal_booking');
            $table->string('day',2);
            $table->string('payment_metode');
            $table->string('transaksi_id')->nullable();
            $table->text('detail_information');
            $table->string('price');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_order');
    }
}
