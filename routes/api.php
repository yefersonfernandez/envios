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

Route::resource('Ciudad', 'CiudadController');
Route::resource('Articulo', 'ArticuloController');
Route::resource('Cliente', 'ClienteController');
Route::resource('DireccionEnvio', 'DireccionEnvioController');
Route::resource('Locacion', 'LocacionController');
Route::resource('Pedido', 'PedidoController');

