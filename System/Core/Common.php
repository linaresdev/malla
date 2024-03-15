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

## PATH
$mallaDir = env("MALLA_DIR", "app");
Malla::addPath([
    "{base}"    => public_path($mallaDir),
    "{cdn}"     => "{base}/cdn",
    "{themes}"  => "{base}/themes",
    "{malla}"   => realpath(__DIR__."/../../"),
    "{http}"    => "{malla}/Http",
    "{system}"  => "{malla}/System",
    "{migrations}"  => "{system}/Database/Migrations",
    "{seeds}"       => "{system}/Database/Seeds"
]);

## URLS
Malla::addUrl([
    "{base}"    => $mallaDir,
    "{cdn}"     => "{base}/cdn",
    "{themes}"  => "{base}/themes"
]);

/*
* START APP*/
if( env("MALLA_START", false) == true )
{
    Malla::app("load")->run(new \Malla\Driver());
}

## EXCEPTIONS 
$this->app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    \Malla\Core\Exceptions\Handler::class
);