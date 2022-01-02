<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('user_id')->unsigned();
            $table->string('kode_booking', 150);
            $table->double('price')->nullable();
            $table->timestamps();
            $table->foreign(['user_id'])->references(['id'])->on('users');

        });
        Schema::create('cart_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cart_id');
            $table->string('nama_item');
            $table->integer('qty')->nullable();
            $table->double('price')->nullable();
            $table->timestamps();
            // $table->foreign(['cart_id'])->references(['id'])->on('cart_item');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
        Schema::dropIfExists('cart_item');
    }
}
