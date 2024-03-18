<?php
namespace Malla\Install\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    public function boot() 
    {
        $this->loadViewsFrom(__DIR__.'/../Views', 'install');
    }

    public function register()
    {
        define("__INSTALL__", realpath(__DIR__."/.."));
    }
}