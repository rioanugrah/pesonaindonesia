<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_generate');
            $table->string('slug');
            $table->string('title');
            $table->text('description');
            $table->text('itinerary');
            $table->text('include')->nullable();
            $table->text('exclude')->nullable();
            $table->string('location');
            // $table->uuid('transportasi_id')->nullable();
            $table->string('duration');
            $table->string('price');
            $table->string('images');
            $table->text('detail_images');
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
        Schema::dropIfExists('tour');
    }
}
