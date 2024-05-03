<?php
namespace Malla\Install\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Account {

    public function data()
    {
        $data['title'] = 'Cuenta Administrativa';

        return $data;
    }

    public function register($request)
    {
        $validate = $request->validate([
            "firstname"     => "required",
            "lastname"      => "required",
            "email"         => "required|email|unique:users,email",
            "password"      => "required",
            "confirm"       => "same:password"
        ]);

        if( ($user = (new \Malla\User\Model\Store)->create($request->all())))
        {
            $user->avatar()->create([
                "url"           => '{cdn}/images/avatar/user.png',
            ]);
        }

        return redirect("end");
    }
}