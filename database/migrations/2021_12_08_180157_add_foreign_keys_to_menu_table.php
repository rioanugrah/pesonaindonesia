<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->foreign(['list_menu_id'])->references(['id'])->on('list_menu');
            $table->foreign(['menu_kategori_id'])->references(['id'])->on('menu_kategori');
            $table->foreign(['role_detail_id'])->references(['id'])->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->dropForeign('menu_list_menu_id_foreign');
            $table->dropForeign('menu_menu_kategori_id_foreign');
            $table->dropForeign('menu_role_detail_id_foreign');
        });
    }
}
