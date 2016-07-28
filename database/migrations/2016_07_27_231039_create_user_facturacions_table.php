<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_facturacions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('cuit');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('cp');
            $table->string('provincia');
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('telefono2');
            $table->string('nacimiento');
            $table->string('empresa');


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
        Schema::drop('user_facturacions');
    }
}
