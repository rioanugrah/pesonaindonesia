<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_register', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id')->unsigned();
            $table->string('kode_tiket',150);
            $table->string('first_name',150);
            $table->string('last_name',150);
            $table->string('email');
            $table->string('kategori_asal');
            $table->string('asal');
            $table->string('no_telp');
            $table->text('alamat');
            $table->enum('is_event_register',array('W','C','R'))->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign(['event_id'])->references(['id'])->on('event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_register');
    }
}
