<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Install\Support\Env;
use Malla\Install\Support\Home;
use Malla\Install\Support\Database;

Route::get("/", function() {
    return view("install::index", (new Home)->data());
});

Route::get("/env", function() {
    return view("install::env", (new Env)->data());
});

Route::prefix("database")->group(function($route)
{
    Route::get("/", function() {
        return view("install::database", (new Database)->data());
    });
});