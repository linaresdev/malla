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

    Route::get("/search/{data?}", "UserController@search");

    # Acciones explicita sobre el usuario
    Route::prefix("/show/{usrID}")->group(function($route) {
        Route::post("update-state", "UserController@postUpdateState");
    });

    Route::get("/profile/{usrID}", "UserController@profile");
});

Route::prefix("modules")->namespace("Module")->group(function()
{
    Route::get("/", "ModuleController@index");

    
});