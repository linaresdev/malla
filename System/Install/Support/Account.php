<?php
namespace Malla\Install\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Model\Group;
use Malla\User\Model\Store as User;

class Account {

    public function data()
    {
        $data['title'] = 'Cuenta Administrativa';

        return $data;
    }

    
    public function register($request)
    {
        $user   = new User;  
        
        $ownerRol  = (new Group)->create(["slug" => "owner", "description" => "Privado"]);
        $ownerRol->addMeta([
            "view"  => 1, "insert" => 1, "update" => 1, "delete" => 1
        ]);

        $adminRol  = (new Group)->create(["slug" => "admin", "description" => "Administrador"]);
        $adminRol->addMeta([
            "view"  => 1, "insert" => 1, "update" => 1, "delete" => 1
        ]);

        $userRol   = (new Group)->create(["slug" => "user", "description" => "Usuario"]);
        $userRol->addMeta([
            "view"  => 1, "insert" => 1, "update" => 1, "delete" => 0
        ]);

        $validate = $request->validate([
            "firstname"     => "required",
            "lastname"      => "required",
            "email"         => "required|email|unique:users,email",
            "password"      => "required",
            "confirm"       => "same:password"
        ]);

        if( ($account = $user->create($request->all())) )
        {
            $account->avatar()->create([
                "url"           => '{cdn}/images/avatar/user.png',
            ]);

            ## Permisos
            $account->groups()->attach($ownerRol->id);
            $account->groups()->attach($userRol->id);
            $account->groups()->attach($adminRol->id);
        }

        return redirect("end");
    }
}