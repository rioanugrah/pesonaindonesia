<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->time('pukul');
            $table->string('icon');
            $table->integer('dari');
            $table->string('departemen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting');
    }
}
