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

// Rutas de departamentos
Route::group(['prefix' => 'departamentos'], function()
{
	Route::get('/', 'DepartamentoController@index');
    Route::get('/{id}', 'DepartamentoController@show');
	Route::get('/{id}/ciudades', 'DepartamentoController@ciudades');
});

// rutas de ciudades
Route::get('ciudades', 'CiudadController@index');
Route::get('ciudades/{id}', 'CiudadController@show');

// ruta para registrar usuarios del concurso
Route::post('concurso/usuario/registrar', 'UsuarioConcursoController@store');
Route::get('concurso/usuario/ganador', 'UsuarioConcursoController@ganador');
