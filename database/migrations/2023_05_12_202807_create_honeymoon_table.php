<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoneymoonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('honeymoon', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_paket');
            $table->string('slug');
            $table->string('nama_paket');
            $table->text('deskripsi');
            $table->string('price');
            $table->string('qty',5);
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
        Schema::dropIfExists('honeymoon');
    }
}
