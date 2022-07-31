<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_order', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama_trip');
            $table->string('from',100);
            $table->string('to',100);
            $table->integer('jumlah_tiket');
            $table->date('tanggal_order');
            $table->string('total_harga');
            $table->timestamps();
        });
        Schema::create('trip_order_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trip_order_id');
            $table->string('kode_tiket');
            $table->string('harga');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_order');
    }
}
