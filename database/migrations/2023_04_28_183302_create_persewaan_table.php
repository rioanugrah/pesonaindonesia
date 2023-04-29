<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersewaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_persewaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori',100);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('persewaan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_persewaan',100);
            $table->integer('kategori_persewaan_id');
            $table->string('nama_barang',150);
            $table->integer('kab_kota');
            $table->integer('provinsi');
            $table->string('images');
            $table->char('user_id');
            // $table->string('satuan',100);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('persewaan_armada', function (Blueprint $table) {
            $table->id();
            $table->integer('persewaan_id');
            $table->string('armada');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('persewaan_harga', function (Blueprint $table) {
            $table->id();
            $table->integer('persewaan_id');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('satuan',100);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('persewaan_spesifikasi', function (Blueprint $table) {
            $table->id();
            $table->integer('persewaan_id');
            $table->string('icon');
            $table->string('spesifikasi');
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
        Schema::dropIfExists('kategori_persewaan');
        Schema::dropIfExists('persewaan');
        Schema::dropIfExists('persewaan_armada');
        Schema::dropIfExists('persewaan_harga');
        Schema::dropIfExists('persewaan_spesifikasi');
    }
}
