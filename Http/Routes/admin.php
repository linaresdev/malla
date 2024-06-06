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
});

Route::prefix("modules")->namespace("Module")->group(function()
{
    Route::get("/", "ModuleController@index");
});