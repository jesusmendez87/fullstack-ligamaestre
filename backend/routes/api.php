<?php

use App\Http\Controllers\Api\LigaController;
use App\Http\Controllers\Api\JugadorController;
use App\Http\Controllers\Api\PartidoController;
use App\Http\Controllers\Api\ClubController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;

use App\Models\Partido;


/********** Rutas públicas **********/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('jugadores', [JugadorController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('api.login');


Route::middleware('auth:api')->group(function ()  {
    Route::post('partido', [PartidoController::class, 'store']);
    Route::get('/jugadores', [JugadorController::class, 'index']);
    Route::get('partidos', [PartidoController::class, 'index']);
    Route::get('ligas', [LigaController::class, 'index']);
    Route::get('equipos', [ClubController::class, 'index']);
    Route::get('/jugadores/{id}', [JugadorController::class, 'show']);
    Route::get('partidos/{id}', [PartidoController::class, 'show']);
    Route::get('ligas/{id}', [LigaController::class, 'show']);
    Route::get('equipos/{id}', [ClubController::class, 'show']);
    Route::match(['put', 'patch'], 'jugadores/{id}', [JugadorController::class, 'update']);
    Route::match(['put', 'patch'], 'ligas/{id}', [LigaController::class, 'update']);
    Route::match(['put', 'patch'], 'equipos/{id}', [ClubController::class, 'update']);
    Route::post('partido', [PartidoController::class, 'store']);
    Route::post('ligas', [LigaController::class, 'store']);
    Route::post('equipos', [ClubController::class, 'store']);

    Route::delete('/delete/usuarios/{id}', [JugadorController::class, 'destroy']);
    Route::delete('/delete/jugadores/{id}', [JugadorController::class, 'destroy']);
    Route::delete('/delete/ligas/{id}', [LigaController::class, 'destroy']);
    Route::delete('/delete/equipos/{id}', [ClubController::class, 'destroy']);
    Route::delete('/delete/partidos/{id}', [PartidoController::class, 'destroy']);


});
