<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Configuración de CORS para la API
   $middleware->api(prepend: [
        \App\Http\Middleware\Cors::class,  // ← PRIMERO
    ]);

        $middleware->api(prepend: [
            \Illuminate\Http\Middleware\HandleCors::class,
        ]);

  $middleware->alias([
        'admin' => App\Http\Middleware\AdminMiddleware::class,
        'api.token' => App\Http\Middleware\ApiTokenAuth::class, //
            ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Forzar respuesta JSON si la ruta empieza por api/
        // Esto evita el error "Route [login] not defined"
        $exceptions->shouldRenderJsonWhen(function (Request $request, Throwable $e) {
            if ($request->is('api/*')) {
                return true;
            }
            return $request->expectsJson();
        });
    })->create(); // Quitamos el punto y coma extra que tenías abajo
