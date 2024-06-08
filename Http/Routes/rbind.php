<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

Route::bind("usrID", function($ID){
    return (new \Malla\User\Model\Store)->find($ID) ?? abort(404);
});