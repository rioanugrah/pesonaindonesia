<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperation', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('nama')->nullable();
            $table->string('email');
            $table->string('nama_perusahaan')->nullable();
            $table->string('logo_perusahaan')->nullable();
            $table->enum('kategori', ['Pribadi', 'Bisnis'])->nullable();
            $table->text('alamat_perusahaan');
            $table->integer('kab_kota');
            $table->integer('provinsi');
            $table->string('kode_pos');
            $table->string('negara');
            $table->string('telp_kantor')->nullable();
            $table->string('telp_selular');
            $table->string('no_fax')->nullable();
            $table->integer('status')->nullable();
            $table->string('berkas')->nullable();
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
        Schema::dropIfExists('cooperation');
    }
}
