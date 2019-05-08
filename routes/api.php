<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'cors', 'prefix' => 'personaladg'], function()
{
    Route::post('ListarPersonalADG', 'PesonaladgController@ListarPersonalADG')->name('ListarPersonalADG');
    Route::get('ListadoTablasIndependientes', 'PesonaladgController@ListadoTablasIndependientes')->name('ListadoTablasIndependientes');
    Route::get('ListadoCCTS', 'PesonaladgController@ListadoCCTS')->name('ListadoCCTS');
    Route::get('ListadoMunicipiolaboral', 'PesonaladgController@ListadoMunicipiolaboral')->name('ListadoMunicipiolaboral');
    Route::get('ListadoArealaboral', 'PesonaladgController@ListadoArealaboral')->name('ListadoArealaboral');
    Route::get('ListadoPuestos', 'PesonaladgController@ListadoPuestos')->name('ListadoPuestos');
    Route::post('DetalleCCT', 'PesonaladgController@DetalleCCT')->name('DetalleCCT');
    Route::post('DetalleMunicipiolaboral', 'PesonaladgController@DetalleMunicipiolaboral')->name('DetalleMunicipiolaboral');
    Route::post('DetalleArealaboral', 'PesonaladgController@DetalleArealaboral')->name('DetalleArealaboral');
    Route::post('DetallePuestos', 'PesonaladgController@DetallePuestos')->name('DetallePuestos');
    Route::post('DetallePersonalADG', 'PesonaladgController@DetallePersonalADG')->name('DetallePersonalADG');
    Route::post('RegistrarPersonalADG', 'PesonaladgController@RegistrarPersonalADG')->name('RegistrarPersonalADG');
    Route::post('EliminarPersonalADG', 'PesonaladgController@EliminarPersonalADG')->name('EliminarPersonalADG');
    Route::post('ActualizarPersonalADG', 'PesonaladgController@ActualizarPersonalADG')->name('ActualizarPersonalADG');
    Route::post('RegistrarCCT', 'PesonaladgController@RegistrarCCT')->name('RegistrarCCT');
    Route::post('ActualizarCCT', 'PesonaladgController@ActualizarCCT')->name('ActualizarCCT');
    Route::post('EliminarCCT', 'PesonaladgController@EliminarCCT')->name('EliminarCCT');
    Route::post('RegistrarMunicipiolaboral', 'PesonaladgController@RegistrarMunicipiolaboral')->name('RegistrarMunicipiolaboral');
    Route::post('ActualizarMunicipiolaboral', 'PesonaladgController@ActualizarMunicipiolaboral')->name('ActualizarMunicipiolaboral');
    Route::post('EliminarMunicipiolaboral', 'PesonaladgController@EliminarMunicipiolaboral')->name('EliminarMunicipiolaboral');
    Route::post('ResgistrarPuestos', 'PesonaladgController@ResgistrarPuestos')->name('ResgistrarPuestos');
    Route::post('ActualizarPuestos', 'PesonaladgController@ActualizarPuestos')->name('ActualizarPuestos');
    Route::post('EliminarPuestos', 'PesonaladgController@EliminarPuestos')->name('EliminarPuestos');
    Route::post('RegistrarArealaboral', 'PesonaladgController@RegistrarArealaboral')->name('RegistrarArealaboral');
    Route::post('ActualizarArealaboral', 'PesonaladgController@ActualizarArealaboral')->name('ActualizarArealaboral');
    Route::post('EliminarArealaboral', 'PesonaladgController@EliminarArealaboral')->name('EliminarArealaboral');
    Route::post('ExportarExcelPersonalADG', 'PesonaladgController@ExportarExcelPersonalADG')->name('ExportarExcelPersonalADG');
    Route::post('ListadoCursos', 'PesonaladgController@ListadoCursos')->name('ListadoCursos');
    Route::post('DetalleCursos', 'PesonaladgController@DetalleCursos')->name('DetalleCursos');
    Route::post('ResgistrarCursos', 'PesonaladgController@ResgistrarCursos')->name('ResgistrarCursos');
    Route::post('ActualizarCursos', 'PesonaladgController@ActualizarCursos')->name('ActualizarCursos');
    Route::post('EliminarCursos', 'PesonaladgController@EliminarCursos')->name('EliminarCursos');
    Route::post('ListarListadoCursosConPersonal', 'PesonaladgController@ListarListadoCursosConPersonal')->name('ListarListadoCursosConPersonal');
    Route::get('ListadoCursosSelect', 'PesonaladgController@ListadoCursosSelect')->name('ListadoCursosSelect');
    Route::post('ListarListadoCursosConPersonalDetallada', 'PesonaladgController@ListarListadoCursosConPersonalDetallada')->name('ListarListadoCursosConPersonalDetallada');
    Route::post('ListarListadoCursosConPersonalRegistrar', 'PesonaladgController@ListarListadoCursosConPersonalRegistrar')->name('ListarListadoCursosConPersonalRegistrar');
    Route::post('ListarListadoCursosConPersonalEliminar', 'PesonaladgController@ListarListadoCursosConPersonalEliminar')->name('ListarListadoCursosConPersonalEliminar');
    Route::post('ListarListadoCursosConPersonalActualizar', 'PesonaladgController@ListarListadoCursosConPersonalActualizar')->name('ListarListadoCursosConPersonalActualizar');
    Route::post('ExportarExcelListadoCursoPersonal', 'PesonaladgController@ExportarExcelListadoCursoPersonal')->name('ExportarExcelListadoCursoPersonal');
    Route::post('ListarListadoSinCursosConPersonal', 'PesonaladgController@ListarListadoSinCursosConPersonal')->name('ListarListadoSinCursosConPersonal');
    Route::post('ExportarListadoSinCursosConPersonalExport', 'PesonaladgController@ExportarListadoSinCursosConPersonalExport')->name('ExportarListadoSinCursosConPersonalExport');
    //podemos seguir recibiendo los metodos
});
/*
Route::prefix('/personaladg')
    ->name('personaladg.')
    ->group(function () {
        ////pruebas de rutas
        Route::post('ListarPersonalADG', 'PesonaladgController@ListarPersonalADG')->name('ListarPersonalADG');
        Route::get('ListadoTablasIndependientes', 'PesonaladgController@ListadoTablasIndependientes')->name('ListadoTablasIndependientes');
        Route::get('ListadoCCTS', 'PesonaladgController@ListadoCCTS')->name('ListadoCCTS');
        Route::get('ListadoMunicipiolaboral', 'PesonaladgController@ListadoMunicipiolaboral')->name('ListadoMunicipiolaboral');
        Route::get('ListadoArealaboral', 'PesonaladgController@ListadoArealaboral')->name('ListadoArealaboral');
        Route::get('ListadoPuestos', 'PesonaladgController@ListadoPuestos')->name('ListadoPuestos');
        Route::post('DetalleCCT', 'PesonaladgController@DetalleCCT')->name('DetalleCCT');
        Route::post('DetalleMunicipiolaboral', 'PesonaladgController@DetalleMunicipiolaboral')->name('DetalleMunicipiolaboral');
        Route::post('DetalleArealaboral', 'PesonaladgController@DetalleArealaboral')->name('DetalleArealaboral');
        Route::post('DetallePuestos', 'PesonaladgController@DetallePuestos')->name('DetallePuestos');
        Route::post('DetallePersonalADG', 'PesonaladgController@DetallePersonalADG')->name('DetallePersonalADG');
        Route::post('RegistrarPersonalADG', 'PesonaladgController@RegistrarPersonalADG')->name('RegistrarPersonalADG');
        Route::post('EliminarPersonalADG', 'PesonaladgController@EliminarPersonalADG')->name('EliminarPersonalADG');
        Route::post('ActualizarPersonalADG', 'PesonaladgController@ActualizarPersonalADG')->name('ActualizarPersonalADG');
        Route::post('RegistrarCCT', 'PesonaladgController@RegistrarCCT')->name('RegistrarCCT');
        Route::post('ActualizarCCT', 'PesonaladgController@ActualizarCCT')->name('ActualizarCCT');
        Route::post('EliminarCCT', 'PesonaladgController@EliminarCCT')->name('EliminarCCT');
        Route::post('RegistrarMunicipiolaboral', 'PesonaladgController@RegistrarMunicipiolaboral')->name('RegistrarMunicipiolaboral');
        Route::post('ActualizarMunicipiolaboral', 'PesonaladgController@ActualizarMunicipiolaboral')->name('ActualizarMunicipiolaboral');
        Route::post('EliminarMunicipiolaboral', 'PesonaladgController@EliminarMunicipiolaboral')->name('EliminarMunicipiolaboral');
        Route::post('ResgistrarPuestos', 'PesonaladgController@ResgistrarPuestos')->name('ResgistrarPuestos');
        Route::post('ActualizarPuestos', 'PesonaladgController@ActualizarPuestos')->name('ActualizarPuestos');
        Route::post('EliminarPuestos', 'PesonaladgController@EliminarPuestos')->name('EliminarPuestos');
        Route::post('RegistrarArealaboral', 'PesonaladgController@RegistrarArealaboral')->name('RegistrarArealaboral');
        Route::post('ActualizarArealaboral', 'PesonaladgController@ActualizarArealaboral')->name('ActualizarArealaboral');
        Route::post('EliminarArealaboral', 'PesonaladgController@EliminarArealaboral')->name('EliminarArealaboral');
        Route::post('ExportarExcelPersonalADG', 'PesonaladgController@ExportarExcelPersonalADG')->name('ExportarExcelPersonalADG');
        Route::post('ListadoCursos', 'PesonaladgController@ListadoCursos')->name('ListadoCursos');
        Route::post('DetalleCursos', 'PesonaladgController@DetalleCursos')->name('DetalleCursos');
        Route::post('ResgistrarCursos', 'PesonaladgController@ResgistrarCursos')->name('ResgistrarCursos');
        Route::post('ActualizarCursos', 'PesonaladgController@ActualizarCursos')->name('ActualizarCursos');
        Route::post('EliminarCursos', 'PesonaladgController@EliminarCursos')->name('EliminarCursos');
        Route::post('ListarListadoCursosConPersonal', 'PesonaladgController@ListarListadoCursosConPersonal')->name('ListarListadoCursosConPersonal');
        Route::get('ListadoCursosSelect', 'PesonaladgController@ListadoCursosSelect')->name('ListadoCursosSelect');
        Route::post('ListarListadoCursosConPersonalDetallada', 'PesonaladgController@ListarListadoCursosConPersonalDetallada')->name('ListarListadoCursosConPersonalDetallada');
        Route::post('ListarListadoCursosConPersonalRegistrar', 'PesonaladgController@ListarListadoCursosConPersonalRegistrar')->name('ListarListadoCursosConPersonalRegistrar');
        Route::post('ListarListadoCursosConPersonalEliminar', 'PesonaladgController@ListarListadoCursosConPersonalEliminar')->name('ListarListadoCursosConPersonalEliminar');
        Route::post('ListarListadoCursosConPersonalActualizar', 'PesonaladgController@ListarListadoCursosConPersonalActualizar')->name('ListarListadoCursosConPersonalActualizar');
        Route::post('ExportarExcelListadoCursoPersonal', 'PesonaladgController@ExportarExcelListadoCursoPersonal')->name('ExportarExcelListadoCursoPersonal');
        Route::post('ListarListadoSinCursosConPersonal', 'PesonaladgController@ListarListadoSinCursosConPersonal')->name('ListarListadoSinCursosConPersonal');
        Route::post('ExportarListadoSinCursosConPersonalExport', 'PesonaladgController@ExportarListadoSinCursosConPersonalExport')->name('ExportarListadoSinCursosConPersonalExport');
    });
*/
