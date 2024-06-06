<?php
namespace Malla\Http\Supports\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\User\Model\Store;

class UserSupport 
{
    protected $user;

    public function __construct( Store $user ) {        
        $this->user = $user;        
    }

    public function share()
    {
        return [
            "container" => "moon-layout-lg pt-4",
            "wrapp"     => "container-fluid"
        ];
    }

    public function index() {

        $data['title'] = 'Usuarios';
        $data["users"] = $this->getUserLists(6);

        return $data;
    }

    public function getUserLists($perpage=5) {
        return $this->user->all();
    }
}