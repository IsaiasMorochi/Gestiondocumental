<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflows', function(Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('porcentaje');
            $table->date('fechaI');
            $table->date('fechaF');
            $table->string('prioridad');
            $table->integer('id_institucion')->unsigned();
            $table->integer('id_documento')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->foreign('id_institucion')->references('id')->on('institucions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_documento')->references('id')->on('documentos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('workflows');
    }
}
