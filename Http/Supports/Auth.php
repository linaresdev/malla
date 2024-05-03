<?php
namespace Malla\Http\Supports;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/


use Malla\Alert\Facade\Alert;

class Auth 
{
    public function index()
    {        
        $data['title'] = __("words.auth");

        return $data;
    }

    public function logon( $request )
    {
        if( ($gurad = auth("web"))->attempt($request->except("_token")) )
        {
            return redirect("/");
        }
        
        Alert::success(__("auth.bad.credentials"));

        return back();
    }
}