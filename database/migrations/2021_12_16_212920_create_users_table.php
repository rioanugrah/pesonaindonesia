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
            // $table->id();
            $table->uuid('id')->primary();
            // $table->uuid('id_key');
            // $table->uuid('id_unique')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('socialite_id')->nullable();
            $table->string('socialite_name')->nullable();
            $table->string('profile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            // $table->uuid('role')->default('3fbdf3fa-1bb1-4a61-9c82-a0836ba4ee12');
            $table->integer('role')->nullable();
            // $table->integer('role')->default(1);
            $table->string('api_token', 80)->nullable();
            $table->string('device_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
