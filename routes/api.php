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
    });
