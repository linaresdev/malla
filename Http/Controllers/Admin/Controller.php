<?php
namespace Malla\Http\Controllers\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

/*
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
*/
use Malla\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController 
{
    protected $path = "malla::admin.";

    // public function settingAdminTheme($support) {

    //     if(method_exists($support, "settings") )
    //     {
    //         return $support->settingTemplate($this);
    //     }
    // //    $this->data["container"] = "moon-layout-md moon-style-light";
    // //    $this->data["wrapp"]     = "container-fluid";      
    // }
}