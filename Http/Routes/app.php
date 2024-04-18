<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/


Route::get("/", "HomeController@index");

Route::get("/login", "AuthController@index");
Route::post("/login", "AuthController@logon");

Route::get("/getmembership", "GetMembershipController@index");
Route::post("/getmembership", "GetMembershipController@getMembership");

## Administracion
Route::prefix("admin")->namespace("Admin")->group(__DIR__."/admin.php");