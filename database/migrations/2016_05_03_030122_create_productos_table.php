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
            $table->string('codigo');
            $table->string('descripcion');
            $table->string('slug')->unique();
            
            $table->double('preciocosto');
            $table->integer('iva_id');
            $table->double('precioventa');
            $table->double('precio1');
            $table->double('rentabi1');
            $table->double('precio2');
            $table->double('rentabi2');
            $table->double('precio3');
            $table->double('rentabi3');

            $table->double('stockcritico');
            $table->double('stockactual');
            $table->double('stockpedido');

            $table->integer('rubro_id');
            $table->integer('marca_id');
            $table->integer('provedor_id');

            $table->integer('categoria_id');
            $table->integer('categoriasub_id');

            $table->string('cod_alter');
            $table->string('ubicacion'); 
            $table->string('cod_bulto');
            $table->double('cant_bulto');

            $table->string('descripcioncorta');
            $table->string('descripcionlarga');

            $table->string('usar_rentabili');
            $table->string('habilitado');
            $table->string('alerta');
            $table->string('observaciones');
            

            $table->string('imagen1');
            $table->string('filename');
            $table->string('oferta');
            $table->string('hot');
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
