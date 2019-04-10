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

            $table->string('nombre', 200);
            $table->string('rfc', 20);
            $table->string('curp', 20);
            $table->string('sexo', 2);
            $table->string('correo', 200);
            $table->string('telefono_casa', 50);
            $table->string('celular', 50);
            $table->string('tipo_de_sangre', 10);
            $table->string('alergia', 10);
            $table->string('estado_civil', 50);
            $table->string('pareja', 10);
            $table->string('numero_de_segurp_social',100 );
            $table->date('fecha_de_nacimiento');
            $table->integer('edad')->unsigned();
            $table->string('nacionalidad', 100);
            $table->string('localidad_de_nacimiento', 200);
            $table->string('municipio_de_nacimiento', 200);
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';


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
        Schema::dropIfExists('personalADG');
    }
}
