<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ListadoCursosConPersonal implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $busqueda, array $filtros)
    {
        $this->busqueda = $busqueda;
        $this->filtros = $filtros;
    }

    public function headings(): array
    {
        return [
            'ID',
            'NOMBRE DEL CURSO',
            'FECHA DE INICIO',
            'FECHA DE TERMINO',
            'AÑO',
            'HORARIO',
            'MUNICIPIO',
            'LOCALIDAD',
            '¿ES ACTUALIZABLE?',
            'NOMBRE COMPLETO PERSONAL ADG',
            'RFC',
            'CURP',
            'CCT',
            'NOMBRE CCT',
            'NOMBRE AREA LABORAL',
            'NOMBRE PUESTO',
            'CORREO ELECTRÓNICO',
            'CELULAR',
            'TELEFONO DE CASA'
        ];
    }


    public function collection()
    {
        if($this->busqueda === 0)
        {
            $listadocursosconpersonal = DB::table('listadocursosconpersonal')
                ->join(
                    'personaladg',
                    'listadocursosconpersonal.id_personaladg',
                    '=',
                    'personaladg.id')
                ->join(
                    'cursos',
                    'listadocursosconpersonal.id_curso',
                    '=',
                    'cursos.id')
                ->join(
                    'arealaboral',
                    'personaladg.arealaboral_id',
                    '=',
                    'arealaboral.id')
                ->join(
                    'ccts',
                    'personaladg.cct_id',
                    '=',
                    'ccts.id')
                ->join(
                    'puestos',
                    'personaladg.id_puesto',
                    '=',
                    'puestos.id')
                ->join(
                    'municipiolaboral',
                    'cursos.id_municipio',
                    '=',
                    'municipiolaboral.id')
                ->select(
                    'listadocursosconpersonal.id as id',
                    'cursos.nombre as NomnbreCursos',
                    'cursos.fecha_inicio as fecha_inicio',
                    'cursos.fecha_termino as fecha_termino',
                    'cursos.year as year',
                    'cursos.horario as horario',
                    'municipiolaboral.nombre as nombreMunicipio',
                    'cursos.localidad as localidad',
                    'cursos.actualizable as actualizable',
                    'personaladg.nombre as NombreCompletoPersonal',
                    'personaladg.rfc as rfc',
                    'personaladg.curp as curp',
                    'ccts.CCT as CCT',
                    'ccts.nombre as NombreCCT',
                    'arealaboral.nombre as NombreArealaboral',
                    'puestos.nombre as NombrePuesto',
                    'personaladg.correo as correo',
                    'personaladg.celular as celular',
                    'personaladg.telefono_casa as telefono_casa')
                ->get();


        }else
        {
            $listadocursosconpersonal = DB::table('listadocursosconpersonal')
                ->join(
                    'personaladg',
                    'listadocursosconpersonal.id_personaladg',
                    '=',
                    'personaladg.id')
                ->join(
                    'cursos',
                    'listadocursosconpersonal.id_curso',
                    '=',
                    'cursos.id')
                ->join(
                    'arealaboral',
                    'personaladg.arealaboral_id',
                    '=',
                    'arealaboral.id')
                ->join(
                    'ccts',
                    'personaladg.cct_id',
                    '=',
                    'ccts.id')
                ->join(
                    'puestos',
                    'personaladg.id_puesto',
                    '=',
                    'puestos.id')
                ->join(
                    'municipiolaboral',
                    'cursos.id_municipio',
                    '=',
                    'municipiolaboral.id')
                ->select(
                    'listadocursosconpersonal.id as id',
                    'cursos.nombre as NomnbreCursos',
                    'cursos.fecha_inicio as fecha_inicio',
                    'cursos.fecha_termino as fecha_termino',
                    'cursos.year as year',
                    'cursos.horario as horario',
                    'municipiolaboral.nombre as nombreMunicipio',
                    'cursos.localidad as localidad',
                    'cursos.actualizable as actualizable',
                    'personaladg.nombre as NombreCompletoPersonal',
                    'personaladg.rfc as rfc',
                    'personaladg.curp as curp',
                    'ccts.CCT as CCT',
                    'ccts.nombre as NombreCCT',
                    'arealaboral.nombre as NombreArealaboral',
                    'puestos.nombre as NombrePuesto',
                    'personaladg.correo as correo',
                    'personaladg.celular as celular',
                    'personaladg.telefono_casa as telefono_casa')
                ->where($this->filtros)->get();
        }


        //
        return $listadocursosconpersonal;
    }
}
