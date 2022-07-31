<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_detail', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('role_id')->index('role_detail_role_id_foreign');
            // $table->unsignedBigInteger('user_id')->index('role_detail_user_id_foreign');
            $table->string('c', 2);
            $table->string('r', 2);
            $table->string('u', 2);
            $table->string('d', 2);
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
        Schema::dropIfExists('role_detail');
    }
}
