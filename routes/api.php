<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/index', 'App\Http\Controllers\PedidoController@index');
Route::get('/producto/{id}', 'App\Http\Controllers\ProductoController@show');
Route::get('/pedidos/{criterio}&{criterio2}&{criterio3}', 'App\Http\Controllers\PedidoController@show');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
