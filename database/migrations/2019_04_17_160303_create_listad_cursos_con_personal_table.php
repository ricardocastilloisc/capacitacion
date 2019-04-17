<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListadCursosConPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listadocursosconpersonal', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_personaladg'); //relacionar la talas
            $table->foreign('id_personaladg')//hacemos la relacion
            ->references('id')//referenciamos la llaver primaria
            ->on('personaladg')//en la tabla razas
            ->onDelete('cascade')// que se pueda eleminar osea trigger
            ->onUpdate('cascade'); //y se pueda actualizar

            $table->unsignedBigInteger('id_curso'); //relacionar la talas
            $table->foreign('id_curso')//hacemos la relacion
            ->references('id')//referenciamos la llaver primaria
            ->on('cursos')//en la tabla razas
            ->onDelete('cascade')// que se pueda eleminar osea trigger
            ->onUpdate('cascade'); //y se pueda actualizar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listadocursosconpersonal');
    }
}
