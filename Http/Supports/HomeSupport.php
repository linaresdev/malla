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
        $data['title'] = 'Home Page';
        return $data;
    }
}