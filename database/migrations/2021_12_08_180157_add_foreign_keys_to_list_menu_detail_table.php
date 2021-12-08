<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToListMenuDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_menu_detail', function (Blueprint $table) {
            $table->foreign(['list_menu_id'])->references(['id'])->on('list_menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_menu_detail', function (Blueprint $table) {
            $table->dropForeign('list_menu_detail_list_menu_id_foreign');
        });
    }
}
