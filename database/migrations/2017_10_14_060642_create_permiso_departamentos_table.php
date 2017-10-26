<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermisoDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_departamentos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('estado');
            $table->integer('id_institucion')->unsigned();
            $table->integer('id_departamento')->unsigned();
            $table->integer('id_permiso')->unsigned();
            $table->foreign('id_institucion')->references('id')->on('institucions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_departamento')->references('id')->on('departamentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_permiso')->references('id')->on('permisos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('permiso_departamentos');
    }
}
