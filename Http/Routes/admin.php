<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/


Route::get("/", "HomeController@index");

Route::prefix("modules")->namespace("Module")->group(function()
{
    Route::get("/", "ModuleController@index");
});