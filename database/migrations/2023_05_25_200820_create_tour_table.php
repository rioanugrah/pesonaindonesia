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
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('kode_tour');
            $table->string('title');
            $table->string('slug');
            $table->string('jenis_tour');
            $table->text('deskripsi');
            $table->bigInteger('tour_category_id')->unsigned();
            $table->string('min_people',2);
            $table->string('max_people',2);
            $table->string('location');
            // $table->text('address');
            $table->string('current_price');
            $table->string('previous_price');
            $table->string('discount',2);
            $table->text('include')->nullable();
            $table->text('exclude')->nullable();
            $table->text('facilities')->nullable();
            $table->text('itinerary')->nullable();
            $table->text('faq')->nullable();
            $table->string('images');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('tour_category_id')->references('id')->on('tour_category')->onDelete('cascade');

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
