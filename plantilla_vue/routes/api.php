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
// routes preguntes
Route::apiResource('pregunta', 'Api\PreguntaController');
Route::get('pregunta/{mode}/{num}/{nivell}', 'Api\PreguntaController@preguntes_mode');


Route::apiResource('resposta', 'Api\RespostaController');
Route::get('resposta/{id_resposta}/{validar}', 'Api\RespostaController@validarResposta');