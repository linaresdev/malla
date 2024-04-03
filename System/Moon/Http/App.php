<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

## LANGS SUPPORT
$this->sourceGrammaries(__DIR__."/Locales");

## URLS
Malla::addUrl([
    "{moon}" => "{themes}/moon"
]);

/*
** VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'moon');

/*
** Publishes */
$this->publishes([
    __DIR__."/Assets" => __path("{themes}/moon")
], "moon");

## HELPERS
$moon = new \Malla\Moon\Http\Support\Moon (
    new \Malla\Core\Support\BootLoader($this->app)
);
$moon->load("style", new \Malla\Moon\Http\Support\Style);

# SHARE
$data["moon"] = (function($app, $args=[], $merge=[]) use ($moon) {    
    return $moon->load($app, $args, $merge);
});

$data['moon_container'] = "container";
$data["moon_wrapp"]     = "col-lg-6 offset-lg-6 col-md-10 offset-md-1 col-sm-12 py-5";

$this->app["view"]->share($data);



