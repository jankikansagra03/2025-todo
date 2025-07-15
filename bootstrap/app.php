<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->group('guest', [
            \App\Http\Middleware\testing::class,
        ]);
        $middleware->group('user', [
            \App\Http\Middleware\loginAuth::class,
        ]);
        $middleware->group('admin', [
            \App\Http\Middleware\adminAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
