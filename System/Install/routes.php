<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Malla\Install\Support\End;
use Malla\Install\Support\Env;
use Malla\Install\Support\Home;
use Malla\Install\Support\Database;

Route::get("/", function() {
    return view("install::index", (new Home)->data());
});

Route::prefix("env")->group(function($route)
{
    Route::get("/", function() {
        return view("install::env", (new Env)->data());
    });
    
    Route::post("/", function( Request $request ) {
        return (new Env)->update($request);
    });
    
    Route::get("/extra", function() {
        return (new Env)->extra();    
    });
    Route::get("/publish", function() {
        return (new Env)->publish();    
    });
});

Route::prefix("database")->group(function($route)
{
    Route::get("/", function() {
        return view("install::database", (new Database)->data());
    });

     Route::get("/migrate/{dbopt}", function($opt) {
         return (new Database)->migrate($opt);
     });
});

Route::get("end", function(){
    return (new End)->application();
});