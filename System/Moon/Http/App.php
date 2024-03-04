<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

$SKIN = new \Malla\Support\Skin("moon");

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
