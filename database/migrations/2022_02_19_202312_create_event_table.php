<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title', 150);
            $table->text('deskripsi')->nullable();
            $table->text('location')->nullable();
            $table->dateTime('start_event')->nullable();
            $table->dateTime('finish_event')->nullable();
            $table->string('image')->nullable();
            $table->enum('is_event',array('W','C','R'))->nullable();
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
        Schema::dropIfExists('event');
    }
}
