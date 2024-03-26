<?php
namespace Malla\Http\Supports;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Auth 
{
    public function index()
    {
        $data['title'] = __("words.auth");

        return $data;
    }
}