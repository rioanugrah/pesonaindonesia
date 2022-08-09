<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partnership', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug');
            $table->string('nama_partner');
            $table->string('penanggung_jawab');
            $table->text('alamat');
            $table->string('file')->nullable();
            $table->string('ttd_1')->nullable();
            $table->string('ttd_2')->nullable();
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
        Schema::dropIfExists('partnership');
    }
}
