<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

## CONFIGS
$this->loadConfig("app", __DIR__."/Config/app.php");
$this->loadConfig("guard", __DIR__."/Config/guard.php");

## IoC
$this->app->bind("Malla", function( $app )
{
    return new \Malla\Core\Support\Malla(
        new \Malla\Core\Support\BootLoader($app)
    );
});

$this->app["malla"] = Malla::app();

## LIBRERIAS
Malla::app("load", new \Malla\Core\Support\Loader($this->app));
Malla::app("urls", new \Malla\Core\Support\Urls($this->app));
Malla::app("agent", new \Malla\Core\Support\Guard($this->app));

## HELPERS
require_once(__DIR__."/Support/Helper.php");

if( env("MALLA_START", false) == true )
{
    Malla::app("load")->run(new \Malla\Driver());
}