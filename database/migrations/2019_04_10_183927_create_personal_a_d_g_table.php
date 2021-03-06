<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalADGTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalADG', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('municipio_id'); //relacionar la talas
            $table->foreign('municipio_id')//hacemos la relacion
            ->references('id')//referenciamos la llaver primaria
            ->on('municipioLaboral')//en la tabla razas
            ->onDelete('cascade')// que se pueda eleminar osea trigger
            ->onUpdate('cascade'); //y se pueda actualizar

            $table->unsignedBigInteger('cct_id'); //relacionar la talas
            $table->foreign('cct_id')//hacemos la relacion
            ->references('id')//referenciamos la llaver primaria
            ->on('CCTS')//en la tabla razas
            ->onDelete('cascade')// que se pueda eleminar osea trigger
            ->onUpdate('cascade'); //y se pueda actualizar

            $table->unsignedBigInteger('arealaboral_id'); //relacionar la talas
            $table->foreign('arealaboral_id')//hacemos la relacion
            ->references('id')//referenciamos la llaver primaria
            ->on('areaLaboral')//en la tabla razas
            ->onDelete('cascade')// que se pueda eleminar osea trigger
            ->onUpdate('cascade'); //y se pueda actualizar

            $table->unsignedBigInteger('id_puesto'); //relacionar la talas
            $table->foreign('id_puesto')//hacemos la relacion
            ->references('id')//referenciamos la llaver primaria
            ->on('puestos')//en la tabla razas
            ->onDelete('cascade')// que se pueda eleminar osea trigger
            ->onUpdate('cascade'); //y se pueda actualizar

            $table->string('nombre', 200)->nullable();;
            $table->string('rfc', 20)->nullable();;
            $table->string('curp', 20)->nullable();;
            $table->string('sexo', 2)->nullable();;
            $table->string('correo', 200)->nullable();;
            $table->string('telefono_casa', 50)->nullable();;
            $table->string('celular', 50)->nullable();;
            $table->string('tipo_de_sangre', 10)->nullable();;
            $table->string('alergia', 10)->nullable();;
            $table->string('estado_civil', 50)->nullable();;
            $table->string('pareja', 10)->nullable();;
            $table->string('numero_de_segurp_social',100 )->nullable();;
            $table->date('fecha_de_nacimiento')->nullable();;
            $table->integer('edad')->nullable();;
            $table->string('nacionalidad', 100)->nullable();;
            $table->string('localidad_de_nacimiento', 200)->nullable();;
            $table->string('municipio_de_nacimiento', 200)->nullable();;
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personalADG');
    }
}
