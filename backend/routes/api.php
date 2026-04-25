<?php

use App\Http\Controllers\Api\LigaController;
use App\Http\Controllers\Api\JugadorController;
use App\Http\Controllers\Api\PartidoController;
use App\Http\Controllers\Api\ClubController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;


/********** Rutas públicas **********/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/jugadores', [JugadorController::class, 'store']);
Route::get('/jugadores-test', function() {
    return \App\Models\Jugador::select('_id', 'username', 'rol')->get();
});
Route::get('/test-versions', function() {
    return [
        'php_mongodb_extension' => phpversion('mongodb'),
        'mongodb_lib' => \MongoDB\Client::class,
        'laravel_mongodb' => class_exists(\MongoDB\Laravel\Eloquent\Model::class) ? 'installed' : 'missing'
    ];
});
Route::post('/test-login', function(Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    $user = \App\Models\Jugador::where('username', $username)->first();

    if (!$user) {
        return response()->json(['error' => 'Usuario no existe'], 404);
    }

    if (!\Hash::check($password, $user->password)) {
        return response()->json(['error' => 'Password incorrecta'], 401);
    }

    return response()->json(['success' => true, 'user' => $user->toArray()]);
});
Route::get('/debug-mongo', function() {
    try {
        $count = \App\Models\Jugador::count();
        $sample = \App\Models\Jugador::first();

        return response()->json([
            'connection' => config('database.default'),
            'database' => config('database.connections.mongodb.database'),
            'dsn' => config('database.connections.mongodb.dsn'),
            'collection' => (new \App\Models\Jugador)->getTable(),
            'total_jugadores' => $count,
            'sample' => $sample
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});
Route::middleware('auth:api')->group(function ()  {
    Route::post('partido', [PartidoController::class, 'store']);
    Route::get('/jugadores', [JugadorController::class, 'index']);
    Route::get('/partidos', [PartidoController::class, 'index']);
    Route::get('/ligas', [LigaController::class, 'index']);
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
