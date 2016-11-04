<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('gabinete')->unsigned();
            $table->foreign('gabinete')->references('id')->on('productos')->onDelete('cascade');

            $table->integer('mother')->unsigned();
            $table->foreign('mother')->references('id')->on('productos')->onDelete('cascade');

            $table->integer('mouse')->unsigned();
            $table->foreign('mouse')->references('id')->on('productos')->onDelete('cascade');

            $table->integer('teclado')->unsigned();
            $table->foreign('teclado')->references('id')->on('productos')->onDelete('cascade');

            $table->integer('video')->unsigned();
            $table->foreign('video')->references('id')->on('productos')->onDelete('cascade');

            $table->integer('procesador')->unsigned();
            $table->foreign('procesador')->references('id')->on('productos')->onDelete('cascade');

            $table->integer('fuente')->unsigned();
            $table->foreign('fuente')->references('id')->on('productos')->onDelete('cascade');

            $table->integer('disco')->unsigned();
            $table->foreign('disco')->references('id')->on('productos')->onDelete('cascade');

            $table->integer('memoria')->unsigned();
            $table->foreign('memoria')->references('id')->on('productos')->onDelete('cascade');
            
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
        Schema::drop('combos');
    }
}
