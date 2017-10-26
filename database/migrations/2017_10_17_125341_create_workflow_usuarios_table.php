<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkflowUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_usuarios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->date('fecha');
            $table->integer('id_institucion')->unsigned();
            $table->integer('id_workflow')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->foreign('id_institucion')->references('id')->on('institucions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_workflow')->references('id')->on('workflows')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('workflow_usuarios');
    }
}
