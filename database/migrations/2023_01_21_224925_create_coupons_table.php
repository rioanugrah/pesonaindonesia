<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('coupons_code');
            $table->string('coupons_type');
            $table->string('coupons_amount')->nullable();
            $table->integer('coupons_discount')->nullable();
            $table->string('coupons_description');
            $table->integer('coupons_limit');
            $table->date('coupons_expired');
            $table->string('coupons_images');
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
        Schema::dropIfExists('vouchers');
    }
}
