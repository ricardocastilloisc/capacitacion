<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

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
}
     */
    public function ListarPersonalADG(Request $request)
    {
        $ListadoPersonalADG = DB::table('personaladg')
            ->join(
                'municipiolaboral',
                'personaladg.municipio_id',
                '=',
                'municipiolaboral.id')
            ->join(
                'arealaboral',
                'personaladg.cct_id',
                '=',
                'arealaboral.id')
            ->join(
                'ccts',
                'personaladg.arealaboral_id',
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
            )
            ->paginate(
                $request->paginacion
            );

        $municipiolaboral = DB::table('municipiolaboral')
            ->get();

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
            'municipiolaboral' => $municipiolaboral
        ];
    }
    //
}
