<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (!$username || !$password) {
            return response()->json(['msg' => 'Faltan username o password'], 400);
        }

        $user = Jugador::where('username', $username)->first();

        if (!$user) {
            return response()->json(['msg' => 'Usuario no existe'], 401);
        }

        if (!Hash::check($password, $user->password)) {
            return response()->json(['msg' => 'Password incorrecto'], 401);
        }

        // Generar token simple
        $token = base64_encode(Str::random(40));

        // Guardar token en el usuario
        $user->api_token = $token;
        $user->save();

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->_id,
                'rol' => $user->rol
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $user->api_token = null;
            $user->save();
        }
        return response()->json(['msg' => 'Logout exitoso']);
    }
}
