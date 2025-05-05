<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin_logged' => \Foostart\Acl\Http\Middleware\AdminLogged::class,
            'logged' => \Foostart\Acl\Http\Middleware\Logged::class,
            'can_see' => \Foostart\Acl\Http\Middleware\CanSee::class,
            'has_perm' => \Foostart\Acl\Http\Middleware\HasPerm::class,
            'in_context' => \Foostart\Category\Middleware\InContext::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
