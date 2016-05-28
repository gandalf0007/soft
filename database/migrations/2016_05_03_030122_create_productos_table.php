<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_codigo');
            $table->string('pro_descrip');
            $table->string('pro_imagen');
            $table->double('pro_preciocosto');
            $table->integer('iva_id');

            $table->double('pro_precio1');
            $table->double('pro_precio2');
            $table->double('pro_precio3');
            $table->double('pro_rentabi1');
            $table->double('pro_rentabi2');
            $table->double('pro_rentabi3');

            $table->double('pro_stock_act');
            $table->double('pro_stock_cri');
            $table->double('pro_stock_ped');

            $table->integer('rubro_id');
            $table->integer('marca_id');

            $table->string('pro_cod_alter');
            $table->string('pro_ubicacion');
            $table->string('pro_cod_bulto');
            $table->double('pro_cant_bulto');

            $table->integer('provedor_id');

            $table->string('pro_habilitado');
            $table->string('pro_alerta');
            $table->string('pro_observaciones');
            $table->string('pro_usar_rentabili');
            
            $table->datetime('fecha_alta');

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
        Schema::drop('productos');
    }
}
