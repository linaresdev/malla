<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/


Route::get("/", "HomeController@index");

## ACCOUNT
Route::prefix("users")->namespace("User")->group(function() {
    Route::get("/", "UserController@index");

    # Acciones explicita sobre el usuario
    Route::prefix("/show/{usrID}")->group(function($route) {

        Route::post("update-state", "UserController@postUpdateState");
    });
});

Route::prefix("modules")->namespace("Module")->group(function()
{
    Route::get("/", "ModuleController@index");

    
});