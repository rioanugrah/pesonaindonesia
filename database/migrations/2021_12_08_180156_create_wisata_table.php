<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_wisata', 100);
            $table->text('deskripsi');
            $table->text('alamat');
            $table->text('fasilitas')->nullable();
            $table->text('hightlight');
            $table->text('timeline')->nullable();
            $table->text('tukar_tiket');
            $table->text('sk');
            $table->text('info_tambahan');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->double('price');
            $table->integer('diskon')->nullable();
            $table->dateTime('periode_awal')->nullable();
            $table->dateTime('periode_akhir')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('wisata');
    }
}
