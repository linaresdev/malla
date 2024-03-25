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
Malla::app("store", new \Malla\Core\Support\Store($this->app["db"]));

## HELPERS
require_once(__DIR__."/Support/Helper.php");

## PATH
Malla::addPath([
    "{cdn}"         => "{basedir}/cdn",
    "{themes}"      => "{basedir}/themes",
    "{malla}"       => realpath(__DIR__."/../../"),
    "{http}"        => "{malla}/Http",
    "{system}"      => "{malla}/System",
    "{migrations}"  => "{system}/Database/Migrations",
    "{seeds}"       => "{system}/Database/Seeds"
]);

## URLS
Malla::addUrl([
    "{base}"    => env("MALLA_PUBLIC_DIR", "app"),
    "{cdn}"     => "{base}/cdn",
    "{themes}"  => "{base}/themes"
]);

/*
* START APP*/

if( Malla::start() )
{
    Malla::app("load")->run(new \Malla\Core\Driver());

    ## EXCEPTIONS 
    $this->app->singleton(
        Illuminate\Contracts\Debug\ExceptionHandler::class,
        \Malla\Core\Exceptions\Handler::class
    );
}
else {
    Malla::app("load")->run(new \Malla\Install\Driver());
}

