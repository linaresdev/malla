<?php
namespace Malla\Http\Supports\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class HomeSupport 
{
    public function share()
    {
        return [
            "container" => "moon-layout-lg",
            "wrapp"     => "container-fluid"
        ];
    }

    public function index()
    {
        $data['title']  =  __("words.dashboard");

        return $data;
    }
}