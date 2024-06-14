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

    public function index($user)
    {
        $data['title']      = 'Usuarios';
        $data["perpage"]    = ($perpage = config("users.lists.perpage"));
        $data["users"]      = $this->getUserLists($perpage);
        $data["filters"]    = [
            "any",  "firstname", "lastname", "email"
        ];        

        return $data;
    }

    public function search( $user, $data ) 
    {        
        $perpage = 6;

        if( empty( $data ) ) {
            return ["users" => $this->getUserLists(10)];
        }
        
        if( ($field = config("users.lists.filter")) != "any" ) {
            $query = $this->user->where( $field, 'LIKE', '%'.$data.'%')                    
                ->get()->take($perpage);
        } 
        else {
            $query = $this->user->where( "firstname", $data )                 
                ->get()->take($perpage);
        }    
             

        return ["users" => $query];
    }

    public function settingUserList($opt) {

    }

    public function getUserLists($perpage=5) {
        return $this->user->orderByDesc("id")->paginate($perpage);
    }

    public function postUpdateState($user, $request)
    {        
        $user->activated = $request->newstate;
        $user->save();

        if( !empty(($back = $request->back)) ) {
            return redirect($back);
        }

        return back();
    }
}