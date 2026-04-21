<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jugador;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // 🔴 Validación básica
        if (!$username || !$password) {
            return response()->json([
                'msg' => 'Faltan username o password'
            ], 400);
        }

        // 🔍 Buscar usuario SOLO por username
        $user = Jugador::where('username', $username)->first();

        if (!$user) {
            return response()->json([
                'msg' => 'Usuario no existe'
            ], 401);
        }

        // 🔐 Verificar password
        if (!Hash::check($password, $user->password)) {
            return response()->json([
                'msg' => 'Password incorrecto'
            ], 401);
        }

        // 🔑 Generar token
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->_id,
                'rol' => $user->rol
            ]
        ]);
    }
}
