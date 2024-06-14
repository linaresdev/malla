<?php
namespace Malla\Http\Controllers;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Malla\Http\Supports\SettingSupport;

class SettingController extends Controller
{
    public function __construct( SettingSupport $app ) {
        $this->boot($app);
    }

    // public function setPerPage( Request $request ) {
    //     return $this->app->settingPerPage( $request );
    // }

    public function saveOrUpdateConfig( Request $request ) {
        return $this->app->saveOrUpdateConfig( $request );
    }
}