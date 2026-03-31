<?php

use App\Http\Controllers\Api\LigaController;
use App\Http\Controllers\Api\JugadorController;
use App\Http\Controllers\Api\PartidoController;
use Illuminate\Support\Facades\Route;

// no vistas, solo API
//Route::apiResource('ligas', LigaController::class);
//Route::apiResource('clubs', ClubController::class);
//Route::apiResource('jugadores', JugadorController::class);

Route::get('ligas', [LigaController::class, 'index']);
Route::get('ligas/{id}', [LigaController::class, 'show']);
Route::get('jugadores', [JugadorController::class, 'index']);
Route::get('jugadores/{id}', [JugadorController::class, 'show']);
Route::get('partidos', [App\Http\Controllers\Api\PartidoController::class, 'index']);
Route::get('partidos/{id}', [App\Http\Controllers\Api\PartidoController::class, 'show']);
    // deshabilitar middleware admin para probar desde postman
   // Route::middleware(['auth', 'admin'])->group(function () {
Route::post('ligas', [LigaController::class, 'store']);
Route::post('jugadores', [JugadorController::class, 'store']);
Route::post('partidos', [PartidoController::class, 'store']);

Route::delete('ligas/{id}', [LigaController::class, 'destroy']);
Route::delete('jugadores/{id}', [JugadorController::class, 'destroy']);
Route::delete('partidos/{id}', [PartidoController::class, 'destroy']);

Route::put('ligas/{id}', [LigaController::class, 'update']);
Route::put('jugadores/{id}', [JugadorController::class, 'update']);
Route::put('partidos/{id}', [PartidoController::class, 'update']);

    //});
