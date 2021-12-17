<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKategoriDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori_detail', function (Blueprint $table) {
            $table->foreign(['kategori_id'])->references(['id'])->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori_detail', function (Blueprint $table) {
            $table->dropForeign('kategori_detail_kategori_id_foreign');
        });
    }
}
