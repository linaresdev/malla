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





