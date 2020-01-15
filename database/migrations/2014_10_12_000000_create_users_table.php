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
            $table->text('name');
            $table->text('email');
            $table->text('username')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->timestamp('last_password_changed_at')->nullable();
            $table->integer('role_id')->default(3);
            $table->integer('point')->default(0);
            $table->text('avatar')->nullable();
            $table->text('cover')->nullable();
            $table->rememberToken();
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
