<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendors_id')->unsigned();
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->text('deskripsi')->nullabel();
            $table->string('price');
            $table->string('discount');
            $table->timestamps();
            $table->foreign('vendors_id')->references('id')->on('vendors')->onDelete('cascade');
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
        Schema::dropIfExists('vendors_product');
    }
}
