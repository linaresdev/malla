<?php
namespace Malla\Menu\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function boot( Kernel $HTTP, Translator $LANG ) 
    {
        require_once(__DIR__.'/../App.php');
    }

    public function register() 
    {
        $this->app->bind("Nav", function($app)
        {
            return new \Malla\Menu\Nav($app);
        });

        $this->app["menu"] = \Malla\Menu\Facade\Nav::app();
    }
}