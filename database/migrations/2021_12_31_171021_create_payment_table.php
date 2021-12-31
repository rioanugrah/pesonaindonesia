<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('partner_tx_id');
            $table->string('description');
            $table->string('notes');
            $table->string('sender_name');
            $table->double('amount');
            $table->string('email');
            $table->string('phone');
            $table->string('is_open');
            $table->dateTime('expiration');
            $table->dateTime('due_date');
            $table->foreign(['user_id'])->references(['id'])->on('users');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
