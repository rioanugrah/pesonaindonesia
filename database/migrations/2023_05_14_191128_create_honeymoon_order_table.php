<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoneymoonOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('honeymoon_order', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('honeymoon_id');
            $table->string('kode_invoice');
            $table->text('data_pria');
            $table->text('data_wanita');
            $table->string('email');
            $table->string('no_telp');
            $table->text('alamat');
            $table->date('wedding_date');
            $table->date('departure_date');
            $table->date('return_date');
            $table->string('price');
            $table->string('qty',25);
            $table->text('payment');
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
        Schema::dropIfExists('honeymoon_order');
    }
}
