<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->string('icon');
            $table->string('kode_order');
            $table->string('nama_order');
            $table->text('pemesan');
            // $table->text('bank');
            $table->integer('qty');
            $table->string('price');
            $table->uuid('user')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_list', function (Blueprint $table) {
            $table->id();
            // $table->uuid('id')->primary();
            $table->uuid('order_id');
            $table->text('pemesan');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
        Schema::dropIfExists('order_list');
    }
}
