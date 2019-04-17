<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 200)->nullable();
            $table->integer('year')->nullable();
            $table->string('instructor', 200)->nullable();
            $table->string('telefono_instructor', 200)->nullable();
            $table->text('objetivo_curso')->nullable();
            $table->unsignedBigInteger('id_municipio'); //relacionar la talas
            $table->foreign('id_municipio')//hacemos la relacion
            ->references('id')//referenciamos la llaver primaria
            ->on('municipiolaboral')//en la tabla razas
            ->onDelete('cascade')// que se pueda eleminar osea trigger
            ->onUpdate('cascade'); //y se pueda actualizar
            $table->string('duracion')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->string('localidad', 200)->nullable();
            $table->string('horario', 200)->nullable();
            $table->string('actualizable', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
