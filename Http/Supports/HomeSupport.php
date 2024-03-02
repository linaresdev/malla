<?php
namespace Malla\Http\Supports;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class HomeSupport
{
    public function index()
    {
        $data['title'] = __("Home");
        return $data;
    }
}