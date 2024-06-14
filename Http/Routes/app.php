<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/


Route::get("/", "HomeController@index");

Route::get("/login", "AuthController@index");
Route::post("/login", "AuthController@logon");

Route::get("/logout", "AuthController@logout");

Route::get("/getmembership", "GetMembershipController@index");
Route::post("/getmembership", "GetMembershipController@getMembership");

Route::prefix("setting")->group(function($route){
    Route::post("/config", "SettingController@saveOrUpdateConfig");
});

## Administracion
Route::prefix("admin")->namespace("Admin")->group(__DIR__."/admin.php");