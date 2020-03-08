<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable()->default(NULL);
            $table->string('password', 255)->nullable(false);
            $table->string('facebook', 200)->default(NULL);
            $table->string('twitter', 200)->default(NULL);
            $table->string('instagram', 200)->default(NULL);
            $table->string('avatar', 200)->default(NULL);
            $table->integer('rol_id');
            $table->rememberToken()->default(NULL);
            $table->timestamps();
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
