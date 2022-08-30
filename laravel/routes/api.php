<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use API\CiudadController;
use API\DepartamentoController;
use API\ClienteController;

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
//rutas api

//ciudades

//Route::resource('ciudades', CiudadController::class);
Route::get('ciudades/{dep_id}', 'CiudadController@buscarCiudadesDep');
Route::resource('departamentos', DepartamentoController::class);

Route::resource('cliente', ClienteController::class);


Route::get('/products', 'ProductoController@index');

Route::resource('products', 'ProductoController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
