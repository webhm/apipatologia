<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MuestraController;
use App\Http\Controllers\Api\V1\InformeController;
use App\Http\Controllers\Api\V1\AsociacionExamenesController;
use App\Http\Controllers\Api\V1\CorteController;
use App\Http\Controllers\Api\V1\PlantillamacroscopicaController;
use App\Http\Controllers\Api\V1\PlantilladiagnosticoController;
use App\Http\Controllers\Api\V1\EstadopedidoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function (){
    Route::get('muestras/obtenersecuencial', [MuestraController::class, 'obtenersecuencial']);
    Route::apiResource('muestras', MuestraController::class);
    Route::apiResource('estadopedidos', EstadopedidoController::class);
    Route::delete('asociacionexamenes/eliminarasociacion/{id}', [AsociacionExamenesController::class, 'eliminarasociacion']);
    Route::apiResource('asociacionexamenes', AsociacionExamenesController::class);
    Route::get('informe/generarsecuencial/{year}/{idtipoinforme}', [InformeController::class, 'generarsecuencial']);
    Route::post('informe/finalizaInforme/{idtipoinforme}', [InformeController::class, 'finalizaInforme']);
    Route::apiResource('informe', InformeController::class);
    Route::get('cortes/generarsecuencial/{letra}/{idinforme}', [CorteController::class, 'generarsecuencial']);
    Route::apiResource('cortes', CorteController::class);
    Route::apiResource('plantilladiagnostico', PlantilladiagnosticoController::class);
    Route::apiResource('plantillamacroscopica', PlantillamacroscopicaController::class);
});
