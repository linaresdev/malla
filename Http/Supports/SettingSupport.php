<?php
namespace Malla\Http\Supports;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Model\Config;

class SettingSupport {

    public function saveOrUpdateConfig($request )
    {        
        $request->user()->saveOrUpdateConfig(
            $request->key, $request->value
        );

        return back();
    }
}