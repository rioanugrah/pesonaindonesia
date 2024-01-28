<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_attribute', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('nama_attribute');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('tour_attribute_detail', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('tour_attribute_id')->unsigned();
            $table->string('nama_attribute');
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('tour_attribute_id')->references('id')->on('tour_attribute')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_attribute');
        Schema::dropIfExists('tour_attribute_detail');
    }
}
