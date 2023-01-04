<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravellingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelling', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('kategori_paket_id');
            $table->string('slug');
            $table->string('nama_travelling');
            $table->text('deskripsi');
            $table->string('jumlah_paket',5);
            $table->string('meeting_point')->nullable();
            $table->text('location');
            $table->text('contact_person');
            $table->dateTime('tanggal_rilis');
            $table->string('diskon',5);
            $table->string('price');
            $table->text('images')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('travelling_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->uuid('travelling_id');
            $table->string('icon');
            $table->string('nama_fasilitas');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('travelling_highlight', function (Blueprint $table) {
            $table->id();
            $table->uuid('travelling_id');
            $table->string('nama_highlight');
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
        Schema::dropIfExists('travelling');
        Schema::dropIfExists('fasilitas');
        Schema::dropIfExists('highlight');
    }
}
