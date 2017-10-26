<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetalleSitiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_sitios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('cargo');
            $table->integer('estadoU');
            $table->integer('id_institucion')->unsigned();
            $table->integer('id_comentario')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->integer('id_sitio')->unsigned();
            $table->foreign('id_institucion')->references('id')->on('institucions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_comentario')->references('id')->on('comentarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('detalle_sitios');
    }
}
