<?php
namespace Malla\Http\Controllers\Admin\Module;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

/*
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
*/
use Malla\Http\Controllers\Admin\Controller as BaseController;

abstract class Controller extends BaseController
{
    protected $path = "malla::admin.modules.";
}