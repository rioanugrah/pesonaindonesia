<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_kategori_id')->nullable();
            $table->string('kode_invoice');
            $table->date('tanggal_invoice');
            $table->string('nama_order');
            $table->text('deskripsi');
            $table->string('nama_pembeli');
            $table->string('email_pembeli');
            $table->string('no_telp_pembeli');
            $table->uuid('user_id')->nullable();
            $table->string('discount');
            $table->string('total');
            $table->string('tax',3);
            $table->string('payment_metode');
            $table->string('status');
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
        Schema::dropIfExists('invoice');
    }
}
