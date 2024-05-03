<?php
namespace Malla\Http\Middlewares;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Handler {

    public function start() {
        return [
            //\Malla\Http\Middlewares\MallaMiddleware::class,
        ];
    }

    public function groups() {
        return [
            "web" => [
                \App\Http\Middleware\EncryptCookies::class,
                \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
                \Illuminate\Session\Middleware\StartSession::class,
                \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                \App\Http\Middleware\VerifyCsrfToken::class,
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
                \Malla\Http\Middlewares\MallaMiddleware::class,
            ]
        ];
    }

    public function routes() {
        return [];
    }
}