<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ListadoSinCursosConPersonalExport implements FromCollection, WithHeadings
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
            'ID PERSONAL ADG',
            'NOMBRE COMPLETO',
            'RFC',
            'CURP',
            'CCT',
            'NOMBRE CCT',
            'NOMBRE AREA LABORAL',
            'NOMBRE PUESTOS',
            'NOMBRE MUNICIPIO LABORAL',
            'CORREO',
            'TELEFONO DE CASA',
            'CELULAR'
        ];
    }


    public function collection()
    {
        if ($this->busqueda === 0) {
            $ListarListadoSinCursosConPersonal = DB::table('listadocursosconpersonal')
                ->rightJoin
                (
                    'personaladg',
                    'listadocursosconpersonal.id_personaladg',
                    '=',
                    'personaladg.id'
                )
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
                    'arealaboral',
                    'personaladg.arealaboral_id',
                    '=',
                    'arealaboral.id')
                ->join(
                    'municipiolaboral',
                    'personaladg.municipio_id',
                    '=',
                    'municipiolaboral.id')
                ->select
                (
                    'personaladg.id as ID_PERSONAL_ADG',
                    'personaladg.nombre as NOMBRE_COMPLETO',
                    'personaladg.rfc as RFC',
                    'personaladg.curp as CURP',
                    'ccts.CCT as CCT',
                    'ccts.nombre as NOMBRE_CCT',
                    'arealaboral.nombre as NOMBRE_AREA_LABORAL',
                    'puestos.nombre as NOMBRE_PUESTOS',
                    'municipiolaboral.nombre as NOMBRE_MUNICIPIO_LABORAL',
                    'personaladg.correo as CORREO',
                    'personaladg.telefono_casa as TELEFONO_DE_CASA',
                    'personaladg.celular as CELULAR'
                )
                ->whereNull('listadocursosconpersonal.id_curso')
                ->get();


        } else {
            $ListarListadoSinCursosConPersonal = DB::table('listadocursosconpersonal')
                ->rightJoin
                (
                    'personaladg',
                    'listadocursosconpersonal.id_personaladg',
                    '=',
                    'personaladg.id'
                )
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
                    'arealaboral',
                    'personaladg.arealaboral_id',
                    '=',
                    'arealaboral.id')
                ->join(
                    'municipiolaboral',
                    'personaladg.municipio_id',
                    '=',
                    'municipiolaboral.id')
                ->select
                (
                    'personaladg.id as ID_PERSONAL_ADG',
                    'personaladg.nombre as NOMBRE_COMPLETO',
                    'personaladg.rfc as RFC',
                    'personaladg.curp as CURP',
                    'ccts.CCT as CCT',
                    'ccts.nombre as NOMBRE_CCT',
                    'arealaboral.nombre as NOMBRE_AREA_LABORAL',
                    'puestos.nombre as NOMBRE_PUESTOS',
                    'municipiolaboral.nombre as NOMBRE_MUNICIPIO_LABORAL',
                    'personaladg.correo as CORREO',
                    'personaladg.telefono_casa as TELEFONO_DE_CASA',
                    'personaladg.celular as CELULAR'
                )
                ->whereNull('listadocursosconpersonal.id_curso')
                ->where($this->filtros)->get();
        }
        //
        return $ListarListadoSinCursosConPersonal;
    }
}
