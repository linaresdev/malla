<?php
namespace Malla\Install\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Malla\Core\Facade\Malla;
use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{

    public function boot() 
    {
        ## VIEWS
        $this->loadViewsFrom(__DIR__.'/../Views', 'install');

        ## DATABASE
        $this->loadMigrationsFrom( __path("{migrations}") );

        /*
        * ADMIN PUBLISHER */   
        $this->publishes([
            __path("{system}/Assets")               => __path("{cdn}"),
            __path("{system}/Moon/Http/Assets")     => __path("{themes}/moon")
        ], "malla");

        /*
        * ALIAS */
    }

    public function register()
    {
        define("__INSTALL__", realpath(__DIR__."/.."));
    }
}