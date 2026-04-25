<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Jugador;

class ApiTokenAuth
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['msg' => 'Token no proporcionado'], 401);
        }

        $user = Jugador::where('api_token', $token)->first();

        if (!$user) {
            return response()->json(['msg' => 'Token inválido'], 401);
        }

        $request->merge(['user' => $user]);

        return $next($request);
    }
}
