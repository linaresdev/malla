<?php
namespace Malla\Core\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Malla\Core\Facade\Malla;
use Illuminate\Support\ServiceProvider;

class MallaServiceProvider extends ServiceProvider
{
    public function boot()
    { 
        /*
        * VIEWS */
        $this->loadViewsFrom(__DIR__.'/../../Exception/Views', 'excep');

        /*
        *  BOOT
        *  Niveles de ejecución del boot
        * -----------------------------------------------------------------
        * [4] => THEMES | [5] => COMPONENTS | [6] => WIDGETS
        * -----------------------------------------------------------------
        */

        /*
        * [4] => THEMES */
        Malla::initialize("theme");

        /*
        * [5] => COMPONENTS */
        Malla::initialize("component");

        /*
        * [6] => WIDGETS */
        Malla::initialize("widget");
    }

    public function register()
    {
        /*
        *  INIT
        *  Niveles de ejecución del registro
        * -----------------------------------------------------------------
        * [0] => CORE | [1] => LIBRARIES | [2] => PACKAGES | [3] => PLUGINS
        * -----------------------------------------------------------------
        */

        /*
        * [1] => LIBRARIES */
        Malla::initialize("library");

        /*
        * [1] => PACKAGES */
        Malla::initialize("package");

        /*
        * [1] => PLUGINS */
        Malla::initialize("plugin");
    }
}