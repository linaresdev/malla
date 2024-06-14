<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

/*
* CONFIGS */

foreach( app("files")->getRequire(__path('{system}/app.php')) as $key => $value ) {
    $this->app["config"]->set($key, $value);
}

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

\Illuminate\Pagination\Paginator::useBootstrapFive();

/*
* ADMIN PUBLISHER */
$this->publishes($this->assets, "malla");

//Nav::container("Main Navbar");
//Nav::container("Nav area 0");

/*
* Seccion de menu */

## Grupos o Contenedores de menu

Nav::container("Nav area 0");
Nav::container("Nav area 1");
Nav::container("Nav area 2");

Nav::container("Aside area 0");
Nav::container("Aside area 1");
Nav::container("Aside area 2");


//dd(Nav::app());