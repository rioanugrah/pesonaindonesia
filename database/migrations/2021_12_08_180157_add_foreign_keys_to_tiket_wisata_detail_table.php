<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTiketWisataDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tiket_wisata_detail', function (Blueprint $table) {
            $table->foreign(['tiket_wisata_id'])->references(['id'])->on('tiket_wisata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tiket_wisata_detail', function (Blueprint $table) {
            $table->dropForeign('tiket_wisata_detail_tiket_wisata_id_foreign');
        });
    }
}
