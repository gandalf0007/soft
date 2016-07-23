<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebInformacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_informacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion1');
            $table->string('direccion2');
            $table->string('direccion3');
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('telefono3');
            $table->string('correo1');
            $table->string('correo2');
            $table->string('correo3');
            $table->string('formasdepago');
            $table->string('garantia');
            $table->string('avisolegal');
            $table->string('envios');
            $table->string('preguntas');
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
        Schema::drop('web_informacions');
    }
}
