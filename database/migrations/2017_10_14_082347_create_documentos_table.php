<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('extension');
            $table->integer('id_institucion')->unsigned();
            $table->integer('id_documento')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_estado')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->foreign('id_institucion')->references('id')->on('institucions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_documento')->references('id')->on('documentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('documentos');
    }
}
