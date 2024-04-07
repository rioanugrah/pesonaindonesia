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
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('team_lead')->nullable();
            $table->text('committee')->nullable();
            $table->text('schedules')->nullable();
            $table->text('location')->nullable();
            $table->string('cover_image')->nullable();
            $table->text('image')->nullable();
            $table->uuid('user_id')->nullable();
            $table->enum('status',array('Y','N','O','C'))->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('event_product', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('event_id');
            $table->string('product')->nullable();
            $table->string('quota',100)->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('event_rating', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('event_id');
            $table->string('rating',5)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('event_view', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('event_id');
            // $table->string('view')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('event_like', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('event_id');
            // $table->string('like')->nullable();
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
        Schema::dropIfExists('event_product');

        Schema::dropIfExists('event_rating');
        Schema::dropIfExists('event_view');
        Schema::dropIfExists('event_like');
    }
}
