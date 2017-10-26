<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetalleContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_contenidos', function(Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('id_institucion')->unsigned();
            $table->integer('id_documento')->unsigned();
            $table->integer('id_directorio')->unsigned();
            $table->integer('id_sitio')->unsigned();
            $table->foreign('id_institucion')->references('id')->on('institucions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_documento')->references('id')->on('documentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_directorio')->references('id')->on('directorios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sitio')->references('id')->on('sitios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('detalle_contenidos');
    }
}
