<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prov_razsoc');
            $table->string('prov_contacto');
            $table->string('prov_mail');
            $table->string('prov_skype');
            $table->string('prov_direccion');
            $table->string('prov_tel');
            $table->string('prov_diasvisita');
            $table->string('prov_cuit');
            $table->string('prov_observacion');
            $table->string('prov_habilitado');
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
        Schema::drop('provedores');
    }
}
