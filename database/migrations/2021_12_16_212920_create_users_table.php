<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('socialite_id')->nullable();
            $table->string('socialite_name')->nullable();
            $table->string('profile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('role')->default(1);
            $table->string('api_token', 80)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->string('avatar');
            $table->string('messenger_color')->default('#2180f3');
            $table->boolean('dark_mode')->default(false);
            $table->boolean('active_status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
