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
            $table->increments('usu_id');
            $table->string('usu_nombre');
            $table->string('usu_apellido');
            $table->string('usu_email')->unique();
            $table->string('usu_password');
            $table->string('usu_direcc');
            $table->string('usu_tel');
            $table->string('usu_perfil');
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
