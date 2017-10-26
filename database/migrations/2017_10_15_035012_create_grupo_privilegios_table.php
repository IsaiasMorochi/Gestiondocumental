<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGrupoPrivilegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_privilegios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('estado');
            $table->integer('id_institucion')->unsigned();
            $table->integer('id_grupo')->unsigned();
            $table->integer('id_privilegio')->unsigned();
            $table->foreign('id_institucion')->references('id')->on('institucions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_privilegio')->references('id')->on('privilegios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('grupo_privilegios');
    }
}
