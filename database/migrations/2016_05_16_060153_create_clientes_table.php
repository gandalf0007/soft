<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clie_nombres');
            $table->string('clie_direccion');
            $table->string('clie_telefono');
            $table->string('clie_mail');
            $table->string('clie_observacion');       
            $table->string('clie_localidad');
            $table->string('clie_iva');
            $table->string('clie_lista_precio');
            $table->string('clie_cuit');
            $table->string('clie_cp');
            $table->string('transp_des');
            $table->integer('clie_habilitado');
            $table->integer('clie_hab_cta');
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
        Schema::drop('clientes');
    }
}
