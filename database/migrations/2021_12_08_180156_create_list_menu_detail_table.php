<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListMenuDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_menu_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('list_menu_id')->index('list_menu_detail_list_menu_id_foreign');
            $table->string('menu_detail');
            $table->string('url');
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
        Schema::dropIfExists('list_menu_detail');
    }
}
