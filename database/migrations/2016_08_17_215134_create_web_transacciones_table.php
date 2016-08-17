<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('web_venta_id');
            $table->string('producto_id');
            $table->string('user');
            $table->string('cantidad');
            $table->string('total_price');
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
        Schema::drop('web_transacciones');
    }
}
