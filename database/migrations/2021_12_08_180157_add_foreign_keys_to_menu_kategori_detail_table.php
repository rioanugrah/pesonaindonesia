<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMenuKategoriDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_kategori_detail', function (Blueprint $table) {
            $table->foreign(['menu_kategori_id'])->references(['id'])->on('menu_kategori');
            $table->foreign(['role_id'])->references(['id'])->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_kategori_detail', function (Blueprint $table) {
            $table->dropForeign('menu_kategori_detail_menu_kategori_id_foreign');
            $table->dropForeign('menu_kategori_detail_role_id_foreign');
        });
    }
}
