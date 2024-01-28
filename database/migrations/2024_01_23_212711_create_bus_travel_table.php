<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_travel', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_generate');
            $table->dateTime('from_date');
            $table->dateTime('finish_date');
            $table->string('slug');
            $table->string('title');
            $table->string('type_bus');
            $table->string('capacity_chair');
            $table->string('format_chair');
            $table->text('fasilities');
            $table->text('reschedule_policy');
            $table->text('route_from');
            $table->text('route_finish');
            $table->text('route_flow');
            $table->string('price');
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
        Schema::dropIfExists('bus_travel');
    }
}
