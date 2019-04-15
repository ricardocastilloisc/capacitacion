<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PersonalADGExport implements FromCollection, WithHeadings
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
            'Nombre municipio donde labora',
            'CCT',
            'Nombre del CCT',
            'Nombre del area laboral',
            'Nombre del puesto',
            'Nombre completo del personal',
            'RFC',
            'CURP',
            'Sexo',
            'Correo electronico',
            'Telefono de casa',
            'Celular',
            'Tipo de sangre',
            'Es alergico',
            'Es alergico',
            'Estado civil',
            'Nombre de la pareja',
            'Numero de seguro social',
            'Fecha de nacimiento',
            'Edad',
            'Nacionalidad',
            'Localidad de nacimiento',
            'Municipio de nacimiento'
        ]
            ;
    }


    public function collection()
    {
        if($this->busqueda === 0)
        {
            $ListadoPersonalADG = DB::table('personaladg')
                ->join(
                    'municipiolaboral',
                    'personaladg.municipio_id',
                    '=',
                    'municipiolaboral.id')
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
                ->select(
                    'personaladg.id as id',
                    'municipiolaboral.nombre as NombreMunicipio',
                    'ccts.CCT as CCT',
                    'ccts.nombre as NombreCCT',
                    'arealaboral.nombre as NombreArealaboral',
                    'puestos.nombre as NombrePuesto',
                    'personaladg.nombre as NombreCompletoPersonal',
                    'personaladg.rfc as rfc',
                    'personaladg.curp as curp',
                    'personaladg.sexo as sexo',
                    'personaladg.correo as correo',
                    'personaladg.telefono_casa as telefono_casa',
                    'personaladg.celular as celular',
                    'personaladg.tipo_de_sangre as tipo_de_sangre',
                    'personaladg.alergia as alergia',
                    'personaladg.estado_civil as estado_civil',
                    'personaladg.pareja as pareja',
                    'personaladg.numero_de_segurp_social as numero_de_segurp_social',
                    'personaladg.fecha_de_nacimiento as fecha_de_nacimiento',
                    'personaladg.edad as edad',
                    'personaladg.nacionalidad as nacionalidad',
                    'personaladg.localidad_de_nacimiento as localidad_de_nacimiento',
                    'personaladg.municipio_de_nacimiento as municipio_de_nacimiento'
                )->get();


        }else
            {
                $ListadoPersonalADG = DB::table('personaladg')
                    ->join(
                        'municipiolaboral',
                        'personaladg.municipio_id',
                        '=',
                        'municipiolaboral.id')
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
                    ->select(
                        'personaladg.id as id',
                        'municipiolaboral.nombre as NombreMunicipio',
                        'ccts.CCT as CCT',
                        'ccts.nombre as NombreCCT',
                        'arealaboral.nombre as NombreArealaboral',
                        'puestos.nombre as NombrePuesto',
                        'personaladg.nombre as NombreCompletoPersonal',
                        'personaladg.rfc as rfc',
                        'personaladg.curp as curp',
                        'personaladg.sexo as sexo',
                        'personaladg.correo as correo',
                        'personaladg.telefono_casa as telefono_casa',
                        'personaladg.celular as celular',
                        'personaladg.tipo_de_sangre as tipo_de_sangre',
                        'personaladg.alergia as alergia',
                        'personaladg.estado_civil as estado_civil',
                        'personaladg.pareja as pareja',
                        'personaladg.numero_de_segurp_social as numero_de_segurp_social',
                        'personaladg.fecha_de_nacimiento as fecha_de_nacimiento',
                        'personaladg.edad as edad',
                        'personaladg.nacionalidad as nacionalidad',
                        'personaladg.localidad_de_nacimiento as localidad_de_nacimiento',
                        'personaladg.municipio_de_nacimiento as municipio_de_nacimiento'
                    )->where($this->filtros)->get();
            }


        //
        return $ListadoPersonalADG;
    }
}
