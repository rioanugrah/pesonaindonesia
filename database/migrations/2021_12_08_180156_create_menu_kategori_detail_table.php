<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuKategoriDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_kategori_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_kategori_id')->index('menu_kategori_detail_menu_kategori_id_foreign');
            $table->unsignedBigInteger('role_id')->index('menu_kategori_detail_role_id_foreign');
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
        Schema::dropIfExists('menu_kategori_detail');
    }
}
