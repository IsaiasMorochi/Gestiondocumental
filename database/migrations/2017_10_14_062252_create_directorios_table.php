<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDirectoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_institucion')->unsigned();
            $table->integer('id_directorio')->unsigned();
            $table->foreign('id_institucion')->references('id')->on('institucions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_directorio')->references('id')->on('directorios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('directorios');
    }
}
