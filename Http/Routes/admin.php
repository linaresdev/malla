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

    Route::prefix("/profile/{usrID}")->group(function(){
        Route::get("/", "UserController@profile");
        
        Route::prefix("update")->group(function($route){        
            ## SET PASSWORD
            Route::get("/password", "UserController@getUpdatePassword");
            Route::post("/password", "UserController@postUpdatePassword");
            
            ## SET CREDENTIAL
            Route::get("/credential", "UserController@getUpdateCredential");
            Route::post("/credential", "UserController@postUpdateCredential");
        });

    });
});

Route::prefix("modules")->namespace("Module")->group(function()
{
    Route::get("/", "ModuleController@index");

    
});