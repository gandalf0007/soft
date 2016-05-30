<?php

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
            $table->increments('id');
            $table->string('usu_nombre');
            $table->string('usu_apellido');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('re_password');
            $table->string('path')->default('avatar.png');
            $table->string('usu_direcc');
            $table->integer('usu_tel');
            $table->string('perfil_id');
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
        Schema::drop('users');
    }
}