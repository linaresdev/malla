<?php
namespace Malla\Http\Supports\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class ModuleSupport {

    public function share()
    {
        return [
            "container" => "moon-layout-md pt-5",
            "wrapp"     => "container"
        ];
    }

    public function index()
    {
        $data['title'] = __("words.modules" );

        return $data;
    }
}