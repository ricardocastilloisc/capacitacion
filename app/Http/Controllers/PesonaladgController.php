<?php

namespace App\Http\Controllers;
use App\Exports\PersonalADGExport;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class PesonaladgController extends Controller
{


    //importante para el api en paginacion
    //acceder a la pagina que nosotros queremos es asi

    //http://127.0.0.1:8000/api/personaladg/ListarPersonalADG?page=35
    /*
     * METODO POST
     * JSON =
     {
	"paginacion": 50

    "busqueda": 0 // 1 cuando hay busqueda
}
     */


    public function ListadoTablasIndependientes()
    {
        $municipiolaboral = DB::table('municipiolaboral')
            ->get();

        $ccts =  DB::table('ccts')
            ->get();

        $arealaboral =  DB::table('arealaboral')
            ->get();

        $puestos =  DB::table('puestos')
            ->get();

        return [
        'municipiolaboral' => $municipiolaboral,
        'ccts' => $ccts,
        'arealaboral' => $arealaboral,
        'puestos' => $puestos,
            ];
    }
    public function ListadoPuestos()
    {
        $puestos =  DB::table('puestos')->get();

        return [
        'puestos' => $puestos
            ];
    }
    public function DetallePuestos(Request $request)
    {
        $DetallePuestos =  DB::table('puestos')->where('id',$request->id_Puestos)->get();

        return [
        'DetallePuestos' => $DetallePuestos
            ];
    }
    public function ActualizarPuestos(Request $request)
    {
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('puestos')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        if($validacion === false)
        {
            $pasaLaFuncion  = true;
            $mensaje =  'Se ha actualizado exitosamente';
            DB::table('puestos')
            ->where('id', $request->id_Puestos)
            ->update(['nombre'  => strtoupper(trim($request->nombre))]);

        }else{
            $mensaje = 'Ya existe el puesto';
        }

        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];
    }
    public function ResgistrarPuestos(Request $request)
    {
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('puestos')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        if($validacion === false)
        {
            $pasaLaFuncion  = true;
            $mensaje =  'Se ha registrado exitosamente';
            DB::table('puestos')->insert(
                [
                    'nombre'  => strtoupper(trim($request->nombre))
                ]
            );
        }else{
            $mensaje = 'Ya existe el puesto';
        }

        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];
    }
    public function EliminarPuestos(Request $request)
    {
        DB::table('puestos')->where('id',$request->id_Puestos)
            ->delete();
        return [
            'codeStatus' => 200
        ];
    }

    public function ListadoArealaboral()
    {
        $arealaboral =  DB::table('arealaboral')->get();

        return [
        'arealaboral' => $arealaboral
            ];
    }
    public function DetalleArealaboral(Request $request)
    {
        $DetalleArealaboral =  DB::table('arealaboral')->where('id',$request->id_Arealaboral)->get();

        return [
        'DetalleArealaboral' => $DetalleArealaboral
            ];
    }
    public function ActualizarArealaboral(Request $request)
    {
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('arealaboral')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        if($validacion === false)
        {
            $pasaLaFuncion  = true;
            $mensaje =  'Se ha actualizado exitosamente';
            DB::table('arealaboral')
                ->where('id',$request->id_Arealaboral) ->update(
                    [
                        'nombre'  => strtoupper(trim($request->nombre))
                    ]
                );
        }else{
            $mensaje = 'Ya existe el puesto';
        }
        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];
    }
    public function EliminarArealaboral(Request $request)
    {
        DB::table('arealaboral')
            ->where('id',$request->id_Arealaboral)
            ->delete();
        return [
            'codeStatus' => 200
        ];
    }
    public function RegistrarArealaboral(Request $request)
    {
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('arealaboral')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        if($validacion === false)
        {
            $pasaLaFuncion  = true;
            $mensaje =  'Se ha registrado exitosamente';
            DB::table('arealaboral')
                ->insert(
                    [
                        'nombre'  => strtoupper(trim($request->nombre))
                    ]
                );
        }else{
            $mensaje = 'Ya existe el puesto';
        }
        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];
    }

    public function ListadoMunicipiolaboral()
    {
        $municipiolaboral =  DB::table('municipiolaboral')->get();

        return [
        'municipiolaboral' => $municipiolaboral
            ];
    }
    public function DetalleMunicipiolaboral(Request $request)
    {
        $DetalleMunicipiolaboral =  DB::table('municipiolaboral')->where('id',$request->id_Municipiolaboral)->get();

        return [
        'DetalleMunicipiolaboral' => $DetalleMunicipiolaboral
            ];
    }
    public function ActualizarMunicipiolaboral(Request $request)
    {
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('municipiolaboral')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        if($validacion === false)
        {
            $pasaLaFuncion  = true;
            $mensaje =  'Se ha actualizado exitosamente';
            DB::table('municipiolaboral')
                ->where('id',$request->id_Municipiolaboral)
                ->update(
                    [
                        'nombre'  => strtoupper(trim($request->nombre))
                    ]
                );
        }else{
            $mensaje = 'Ya existe el puesto';
        }
        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];
    }
    public function EliminarMunicipiolaboral(Request $request)
    {
       DB::table('municipiolaboral')
           ->where('id',$request->id_Municipiolaboral)
           ->delete();
        return [
            'codeStatus' => 200
        ];
    }
    public function RegistrarMunicipiolaboral(Request $request)
    {
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('municipiolaboral')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        if($validacion === false)
        {
            $pasaLaFuncion  = true;
            $mensaje =  'Se ha registrado exitosamente';
            DB::table('municipiolaboral')
                ->insert(
                    [
                        'nombre'  => strtoupper(trim($request->nombre))
                    ]
                );
        }else{
            $mensaje = 'Ya existe el puesto';
        }
        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];

    }
    public function ListadoCCTS()
    {
        $ccts =  DB::table('ccts')->get();

        return [
        'ccts' => $ccts
            ];
    }
    public function DetalleCCT(Request $request)
    {
        $DetalleCCT =  DB::table('ccts')->where('id',$request->id_cct)->get();

        return [
        'DetalleCCT' => $DetalleCCT
            ];
    }

    public function ActualizarCCT(Request $request)
    {
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('ccts')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        $validacion2  = DB::table('ccts')->where('CCT',strtoupper(trim($request->CCT)))->exists();
        if($validacion === false)
        {
            if($validacion2 === false)
            {
                $pasaLaFuncion  = true;
                $mensaje =  'Se ha actualizado exitosamente';
                DB::table('ccts')
                    ->where('id',$request->id_cct)
                    ->update(
                        [
                            'CCT'  => strtoupper(trim($request->CCT)),
                            'nombre'  => strtoupper(trim($request->nombre))
                        ]
                    );
            }
            else
                {
                    $mensaje = 'Ya existe el puesto';
                }
        }
        else
            {
            $mensaje = 'Ya existe el puesto';
            }
        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];
    }
    public function EliminarCCT(Request $request)
    {
       DB::table('ccts')
            ->where('id',$request->id_cct)
            ->delete();
        return [
            'codeStatus' => 200
        ];
    }
    public function RegistrarCCT(Request $request)
    {
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('ccts')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        $validacion2  = DB::table('ccts')->where('CCT',strtoupper(trim($request->CCT)))->exists();
        if($validacion === false)
        {
            if($validacion2 === false)
            {
                $pasaLaFuncion  = true;
                $mensaje =  'Se ha registrado exitosamente';
                DB::table('ccts')
                    ->insert(
                        [
                            'CCT'  => strtoupper(trim($request->CCT)),
                            'nombre'  => strtoupper(trim($request->nombre))
                        ]
                    );
            }
            else
            {
                $mensaje = 'Ya existe el puesto';
            }
        }
        else
        {
            $mensaje = 'Ya existe el puesto';
        }
        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];
    }

    public function DetallePersonalADG(Request $request)
    {
        $DetallePersonalADG = DB::table('personaladg')
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
                'personaladg.municipio_id as municipio_id',
                'personaladg.cct_id as cct_id',
                'personaladg.arealaboral_id as arealaboral_id',
                'personaladg.id_puesto as id_puesto',
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
            )->where('personaladg.id',$request->id_PersonalADG)->get();

        return [
            'DetallePersonalADG' => $DetallePersonalADG
        ];
    }

    public function EliminarPersonalADG(Request $request)
    {
        DB::table('personaladg')
            ->where('personaladg.id', '=', $request->idPersonalADG)
            ->delete();
        return [
            'codeStatus' => 200
        ];
    }

    public function ActualizarPersonalADG(Request $request)
    {

        /*JSON  para registrar
         *
         *
         *
         * {
     "id_PersonalADG": 1716 ,
	"municipio_id":1,
	"cct_id": 1,
	"arealaboral_id": 1,
	"id_puesto": 1,
	"nombre": "Ricardo Castillo",
	"rfc": "caor930531",
	"curp": "caor930531",
	"sexo": "m",
	"correo": "cre@efe.com",
	"telefono_casa": "983-05-10",
	"celular": "98310454",
	"tipo_de_sangre": "o+",
	"alergia": "si",
	"estado_civil": "casado",
	"pareja": "si",
	"numero_de_segurp_social": "04-50",
	"fecha_de_nacimiento": "2019-04-11",
	"edad": 12,
	"nacionalidad": "mexicana",
	"localidad_de_nacimiento": "chetumal",
	"municipio_de_nacimiento": "othon p blanco"
}
         *
         * */
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('personaladg')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        $validacion2  = DB::table('personaladg')->where('rfc',strtoupper(trim($request->rfc)))->exists();
        $validacion3  = DB::table('personaladg')->where('curp',strtoupper(trim($request->curp)))->exists();
        if($validacion === false)
        {
            if($validacion2 === false)
            {
                if($validacion3 === false)
                {
                    $pasaLaFuncion  = true;
                    $mensaje =  'Se ha actualizado exitosamente';
                    DB::table('personaladg')
                        ->where('personaladg.id',$request->id_PersonalADG)
                        ->update(
                            [
                                'personaladg.municipio_id'  => $request->municipio_id,
                                'personaladg.cct_id'  => $request->cct_id,
                                'personaladg.arealaboral_id' => $request->arealaboral_id,
                                'personaladg.id_puesto' => $request->id_puesto,
                                'personaladg.nombre' => strtoupper(trim($request->nombre)),
                                'personaladg.rfc' => strtoupper(trim($request->rfc)),
                                'personaladg.curp' => strtoupper(trim($request->curp)),
                                'personaladg.sexo' => strtoupper(trim($request->sexo)),
                                'personaladg.correo' => strtolower(trim($request->correo)),
                                'personaladg.telefono_casa' => $request->telefono_casa,
                                'personaladg.celular' => $request->celular,
                                'personaladg.tipo_de_sangre'  => strtoupper(trim($request->tipo_de_sangre)),
                                'personaladg.alergia' => strtoupper(trim($request->alergia)),
                                'personaladg.estado_civil' => strtoupper(trim($request->estado_civil)),
                                'personaladg.pareja'  => strtoupper(trim($request->pareja)),
                                'personaladg.numero_de_segurp_social' => $request->numero_de_segurp_social,
                                'personaladg.fecha_de_nacimiento' => $request->fecha_de_nacimiento,
                                'personaladg.edad' => $request->edad,
                                'personaladg.nacionalidad'  =>strtoupper(trim( $request->nacionalidad)),
                                'personaladg.localidad_de_nacimiento' => strtoupper(trim($request->localidad_de_nacimiento)),
                                'personaladg.municipio_de_nacimiento'  => strtoupper(trim($request->municipio_de_nacimiento))
                            ]
                        );
                }
                else
                {
                    $mensaje = 'Ya existe el puesto';
                }
            }
            else
            {
                $mensaje = 'Ya existe el puesto';
            }
        }
        else
        {
            $mensaje = 'Ya existe el puesto';
        }

        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];
    }



    public function RegistrarPersonalADG(Request $request)
    {

        /*JSON  para registrar
         *
         *
         *
         * {
	"municipio_id":1,
	"cct_id": 1,
	"arealaboral_id": 1,
	"id_puesto": 1,
	"nombre": "Ricardo Castillo",
	"rfc": "caor930531",
	"curp": "caor930531",
	"sexo": "m",
	"correo": "cre@efe.com",
	"telefono_casa": "983-05-10",
	"celular": "98310454",
	"tipo_de_sangre": "o+",
	"alergia": "si",
	"estado_civil": "casado",
	"pareja": "si",
	"numero_de_segurp_social": "04-50",
	"fecha_de_nacimiento": "2019-04-11",
	"edad": 12,
	"nacionalidad": "mexicana",
	"localidad_de_nacimiento": "chetumal",
	"municipio_de_nacimiento": "othon p blanco"
}
         *
         * */
        $mensaje = '';
        $pasaLaFuncion = false;
        $validacion  = DB::table('personaladg')->where('nombre',strtoupper(trim($request->nombre)))->exists();
        $validacion2  = DB::table('personaladg')->where('rfc',strtoupper(trim($request->rfc)))->exists();
        $validacion3  = DB::table('personaladg')->where('curp',strtoupper(trim($request->curp)))->exists();
        if($validacion === false)
        {
            if($validacion2 === false)
            {
                if($validacion3 === false)
                {
                    $pasaLaFuncion  = true;
                    $mensaje =  'Se ha registrado exitosamente';
                    DB::table('personaladg')
                        ->insert(
                            [
                                'personaladg.municipio_id'  => $request->municipio_id,
                                'personaladg.cct_id'  => $request->cct_id,
                                'personaladg.arealaboral_id' => $request->arealaboral_id,
                                'personaladg.id_puesto' => $request->id_puesto,
                                'personaladg.nombre' => strtoupper(trim($request->nombre)),
                                'personaladg.rfc' => strtoupper(trim($request->rfc)),
                                'personaladg.curp' => strtoupper(trim($request->curp)),
                                'personaladg.sexo' => strtoupper(trim($request->sexo)),
                                'personaladg.correo' => strtolower(trim($request->correo)),
                                'personaladg.telefono_casa' => $request->telefono_casa,
                                'personaladg.celular' => $request->celular,
                                'personaladg.tipo_de_sangre'  => strtoupper(trim($request->tipo_de_sangre)),
                                'personaladg.alergia' => strtoupper(trim($request->alergia)),
                                'personaladg.estado_civil' => strtoupper(trim($request->estado_civil)),
                                'personaladg.pareja'  => strtoupper(trim($request->pareja)),
                                'personaladg.numero_de_segurp_social' => $request->numero_de_segurp_social,
                                'personaladg.fecha_de_nacimiento' => $request->fecha_de_nacimiento,
                                'personaladg.edad' => $request->edad,
                                'personaladg.nacionalidad'  =>strtoupper(trim( $request->nacionalidad)),
                                'personaladg.localidad_de_nacimiento' => strtoupper(trim($request->localidad_de_nacimiento)),
                                'personaladg.municipio_de_nacimiento'  => strtoupper(trim($request->municipio_de_nacimiento))
                            ]
                        );
                }
                else
                {
                    $mensaje = 'Ya existe el puesto';
                }
            }
            else
            {
                $mensaje = 'Ya existe el puesto';
            }
        }
        else
        {
            $mensaje = 'Ya existe el puesto';
        }
        return [
            'codeStatus' => 200,
            'mensaje' => $mensaje,
            'pasaLaFuncion' => $pasaLaFuncion
        ];
    }






// Para hacer la exportaciones es de la siguiente manera

//php artisan make:export PersonalADGExport

/// el json es parecido al listado la diferancia hay que mandar
/// NombreReporte



    public function ExportarExcelPersonalADG(Request $request)
    {

        $filtros = [];

        if($request->municipio_id !== null)
        {
            array_push($filtros,['personaladg.municipio_id','=', $request->municipio_id ]);
        }
        if($request->arealaboral_id !== null)
        {
            array_push($filtros,['personaladg.arealaboral_id','=', $request->arealaboral_id ]);
        }
        if($request->id_puesto !== null)
        {
            array_push($filtros,['personaladg.id_puesto','=', $request->id_puesto ]);
        }
        if($request->CCT !== null)
        {
            array_push($filtros,['ccts.CCT','like', '%'. $request->CCT  . '%' ]);
        }
        if($request->nombreCCT !== null)
        {
            array_push($filtros,['ccts.nombre','like', '%'. $request->nombreCCT  . '%' ]);
        }
        if($request->nombrePersonalADG !== null)
        {
            array_push($filtros,['personaladg.nombre','like', '%'. $request->nombrePersonalADG  . '%' ]);
        }
        if($request->rfc !== null)
        {
            array_push($filtros,['personaladg.rfc','like', '%'. $request->rfc  . '%' ]);
        }
        if($request->curp !== null)
        {
            array_push($filtros,['personaladg.rfc','like', '%'. $request->curp  . '%' ]);
        }
        if($request->sexo !== null)
        {
            array_push($filtros,['personaladg.sexo','=', $request->sexo ]);
        }
        if($request->tipo_de_sangre !== null)
        {
            array_push($filtros,['personaladg.tipo_de_sangre','like', '%'. $request->tipo_de_sangre . '%' ]);
        }
        if($request->estado_civil !== null)
        {
            array_push($filtros,['personaladg.estado_civil','=', $request->estado_civil]);
        }

        //return Excel::download(new PersonalADGExport($request->busqueda, []), 'Reporte_Personal_ADG.xlsx');

        if ($request->busqueda == 0 || !$request->busqueda )
        {
            return Excel::download(new PersonalADGExport($request->busqueda, $filtros), $request->NombreReporte.'.xlsx');
        }else {
            return Excel::download(new PersonalADGExport($request->busqueda, $filtros), $request->NombreReporte.'.xlsx'.'.xlsx');
        }

    }





    public function ListarPersonalADG(Request $request)
    {
 /*
  * esto es para agregar filtros

 $filtros = [['personaladg.id','=',3 ]];

    array_push($filtros,['rfc','=','BORA9002021SA']);

    ->where($filtros)

    */

        if ($request->busqueda == 0 || !$request->busqueda )
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
                )->paginate(
                    $request->paginacion
                );

        }else {

            /*
             * municipio_id->exacto
		cct_id
		arealaboral_id->exacto
	id_puesto->exacto

            nombreCCT



            $request->busqueda
            */

            $filtros = [];

            $saludo = '';
            if($request->municipio_id !== null)
            {
                array_push($filtros,['personaladg.municipio_id','=', $request->municipio_id ]);
            }
            if($request->arealaboral_id !== null)
            {
                array_push($filtros,['personaladg.arealaboral_id','=', $request->arealaboral_id ]);
            }
            if($request->id_puesto !== null)
            {
                array_push($filtros,['personaladg.id_puesto','=', $request->id_puesto ]);
            }
            if($request->CCT !== null)
            {
                array_push($filtros,['ccts.CCT','like', '%'. $request->CCT  . '%' ]);
            }
            if($request->nombreCCT !== null)
            {
                array_push($filtros,['ccts.nombre','like', '%'. $request->nombreCCT  . '%' ]);
            }
            if($request->nombrePersonalADG !== null)
            {
                array_push($filtros,['personaladg.nombre','like', '%'. $request->nombrePersonalADG  . '%' ]);
            }
            if($request->rfc !== null)
            {
                array_push($filtros,['personaladg.rfc','like', '%'. $request->rfc  . '%' ]);
            }
            if($request->curp !== null)
            {
                array_push($filtros,['personaladg.rfc','like', '%'. $request->curp  . '%' ]);
            }
            if($request->sexo !== null)
            {
                array_push($filtros,['personaladg.sexo','=', $request->sexo ]);
            }
            if($request->tipo_de_sangre !== null)
            {
                array_push($filtros,['personaladg.tipo_de_sangre','like', '%'. $request->tipo_de_sangre . '%' ]);
            }
            if($request->estado_civil !== null)
            {
                array_push($filtros,['personaladg.estado_civil','=', $request->estado_civil]);
            }

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
                )->where($filtros)->paginate(
                    $request->paginacion
                );
        }

        return [
            'pagination' => [
                'total' => $ListadoPersonalADG->total(),
                'current_page' => $ListadoPersonalADG->currentPage(),
                'per_page' => $ListadoPersonalADG->perPage(),
                'last_page' => $ListadoPersonalADG->lastPage(),
                'from' => $ListadoPersonalADG->firstItem(),
                'to' => $ListadoPersonalADG->lastItem(),
            ],
            'ListadoPersonalADG' => $ListadoPersonalADG,

        ];
    }
    //
}
