<?php
namespace Malla\Http\Supports;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class HomeSupport
{
    public function share()
    {
        $data['wrapp'] = "wrapp wrapp-md";
        return $data;
    }
    public function index()
    {
        $data['title'] = __("Home");
        
        return $data;
    }
}