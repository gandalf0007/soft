<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_footers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo');
            $table->string('descripcion');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('gogole');
            $table->string('youtube');
            
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
        Schema::drop('web_footers');
    }
}
