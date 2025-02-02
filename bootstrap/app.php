<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckUserSuspended;
use App\Http\Middleware\NormalUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'normalUser' => NormalUser::class,
            "admin" => AdminMiddleware::class,
            "suspend" => CheckUserSuspended::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
