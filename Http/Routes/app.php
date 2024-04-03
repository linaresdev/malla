<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

Route::get("/", "HomeController@index");

Route::get("/login", "AuthController@index");
Route::post("/login", "AuthController@index");

Route::get("/getmembership", "GetMembershipController@index");