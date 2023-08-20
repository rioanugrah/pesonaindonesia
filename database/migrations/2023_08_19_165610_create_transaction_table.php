<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('transaction_code');
            $table->string('transaction_unit');
            $table->text('transaction_order');
            $table->integer('transaction_qty');
            $table->double('transaction_price');
            $table->uuid('user')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('transaction_list', function (Blueprint $table) {
            $table->id();
            // $table->uuid('id')->primary();
            $table->uuid('transaction_id');
            $table->text('transaction_order');
            $table->integer('qty');
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
        Schema::dropIfExists('transaction');
        Schema::dropIfExists('transaction_list');
    }
}
