<?php
namespace Malla\Http\Supports\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Menu\Facade\Nav;
use Malla\User\Model\Store;
use Illuminate\Support\Facades\DB;

class UserSupport 
{
    protected $user;

    public function __construct( Store $user ) {        
        //$this->user = $user;  

        Nav::save( new \Malla\Http\Menu\Admin\UserNav($user) );
        
        // Nav::save([
        //     "tag"           => "users-nav-profile",
        //     "route"         => "admin/users*",
        //     "description"   => "Public Nav 0",
        //     "template"      => "bootstrap",
        //     "filters"       => [],
        //     "items"         => [
        //         [
        //             "type" => "link",
        //             "icon"  => "mdi-account",
        //             "label" => "Usuarios",
        //             "url"   => "admin/users"
        //         ]
        //     ],
        // ]);
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
        $data["filters"]    = config("users.lists.available.filter");        

        return $data;
    }

    public function search( $data ) 
    { 
        if( !empty($data) ) {

            $scrField          = config("users.lists.filter");
            $fieldAvailable    = config("users.lists.available.filter");
            $extractFirstField = array_shift($fieldAvailable);

            $query = (new Store);
            
            ## MIXER
            if( $scrField == "any" ) { 
                foreach( $fieldAvailable as $field ) {
                    if( ($query = (new Store)->where( $field, "LIKE", '%'.$data.'%' ))->count() > 0 ) {   
                        return ["users" => $query->get()->take(6)];
                    }
                }
            }

            ## MIXER
            if( $scrField != "any" ) {                                               
                if( ($query = (new Store)->where( $scrField, "LIKE", '%'.$data.'%' ))->count() > 0 ) {   
                    return ["users" => $query->take(6)->get()];
                }                
            }
        }

        return ["users" => null];
    }

    public function settingUserList($opt) {

    }

    public function getUserLists($perpage=5) {
        return (new Store)->orderByDesc("id")->paginate($perpage);
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

    ## SHOW
    public function profile($user) {

        $data["title"] = $user->firstname;
        $data["user"] = $user;

        return $data;
    }
}