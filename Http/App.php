<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

/*
* CONFIGS */
$SKIN = config("app.skin");

## URLS
Malla::addUrl([
    "{mainbar}" => "/",
    "{current}" => request()->path()
]);

/*
* LANGUAGE */
//$this->loadGrammary( $LANG );
$this->loadGrammary( $LANG );

## DATABASE
$this->loadMigrationsFrom( __path("{migrations}") );

/*
* MIDDLEWARES */
$this->loadMiddleware(new \Malla\Http\Middlewares\Handler());

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'malla');

/*
* SKIN */
if( array_key_exists( $SKIN, ($themes = Malla::module("themes"))) )
{            
    if( method_exists( ($driver = $themes[$SKIN]), "load") )
    {
        $data           = $driver->data();
        $data["skin"]   = new \Malla\Support\Skin($driver);        

        require_once( $driver->load() ); 

        $this->app["view"]->share($data);       
    }
}

$this->assets[__path("{system}/Assets")] = __path("{cdn}");

/*
* ADMIN PUBLISHER */
$this->publishes($this->assets, "malla");

Nav::container("main-menu");
Nav::container("navbar");

Nav::save( \Malla\Http\Menu\Admin\UserNav::class );

// Nav::save("admin-nav", function( $nav ) {
//     ## Crea tu menu
// });

// dd(Nav::app());
// dd(Nav::tag("admin-users-nav", 4));
