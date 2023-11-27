<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlesiranMalangTourImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('plesiran_malang')->create('tour_image', function (Blueprint $table) {
            $table->id();
            $table->uuid('tour_id');
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
        Schema::connection('plesiran_malang')->dropIfExists('tour_image');
    }
}
