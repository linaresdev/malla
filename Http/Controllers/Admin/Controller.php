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

}