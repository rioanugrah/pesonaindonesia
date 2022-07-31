<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_room', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_booking');
            $table->bigInteger('hotel_id')->unsigned();
            $table->bigInteger('kamar_hotel_id')->unsigned();
            $table->dateTime('check_in')->nullable();
            $table->dateTime('check_out')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign(['hotel_id'])->references(['id'])->on('hotel');
            $table->foreign(['kamar_hotel_id'])->references(['id'])->on('kamar_hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_room');
    }
}
