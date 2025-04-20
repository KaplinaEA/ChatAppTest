<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\{Exceptions, Middleware};
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(
            static function (Throwable $e, Request $request) {
                if ($request->is('api/*')) {
                    if ($e instanceof ValidationException) {
                        $code = Response::HTTP_BAD_REQUEST;
                        $details = $e->validator->getMessageBag()->getMessages();
                    }

                    return response()->json([
                        'details' => $details ?? $e->getMessage()
                    ], $code ?? Response::HTTP_INTERNAL_SERVER_ERROR);
                }
            }
        );
    })->create();
