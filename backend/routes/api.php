<?php

use App\Http\Controllers\Api\LigaController;
use App\Http\Controllers\Api\JugadorController;
use App\Http\Controllers\Api\PartidoController;
use App\Http\Controllers\Api\ClubController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Cambia ->name('login') por ->name('api.login')
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('jugadores', [JugadorController::class, 'store']);

Route::middleware('auth:api')->group(function () {

    Route::get('partidos', [PartidoController::class, 'index']);
    Route::get('jugadores', [JugadorController::class, 'index']);
    Route::get('ligas', [LigaController::class, 'index']);
    Route::get('equipos', [ClubController::class, 'index']);
    Route::addRoute(['put', 'patch'], 'jugadores/{id}', [JugadorController::class, 'update']);route::addRoute(['put', 'patch'], 'partidos/{id}', [PartidoController::class, 'update']);
    Route::addRoute(['put', 'patch'], 'ligas/{id}', [LigaController::class, 'update']);
    Route::addRoute(['put', 'patch'], 'equipos/{id}', [ClubController::class, 'update']);
    Route::post('partido', [PartidoController::class, 'store']);
    Route::post('ligas', [LigaController::class, 'store']);
    Route::post('equipos', [ClubController::class, 'store']);

    Route::delete('/delete/jugadores/{id}', [JugadorController::class, 'destroy']); 
    Route::delete('/delete/usuarios/{id}', [PartidoController::class, 'destroy']);
    Route::delete('/delete/ligas/{id}', [LigaController::class, 'destroy']);
    Route::delete('/delete/equipos/{id}', [ClubController::class, 'destroy']);
    Route::delete('/delete/partidos/{id}', [PartidoController::class, 'destroy']);      
    

});
