<?php
namespace Malla\Http\Supports\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Menu\Facade\Nav;
use Malla\User\Model\Store;
use Malla\Core\Facade\Malla;
use Malla\Alert\Facade\Alert;
use Illuminate\Support\Facades\DB;

class UserSupport 
{
    protected $user;

    public function __construct( Store $user ) {
        Nav::save( new \Malla\Http\Menu\Admin\UserNav($user) );
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

        Malla::addUrl([
            "{usrID}" => $user->id,
            "{profiler}" => "admin/users/profile/{usrID}"
        ]);

        return $data;
    }

    public function updatePassword( $user, $request ) {

        $request->validate([
            "password"  => "required",
            "rpassword" => "same:password"
        ]);
        
        $user->password = $request->password;

        if( $user->save() ) {
            Alert::success(__("update.successfull"));
        }
        else {
            Alert::danger(__("update.error"));
        }
        return back();
    }

    public function updateCredential( $user, $request )
    {
        ## VALIDATOR
        $ruls = null;
        $data = $request->except(['_token', 'form']);

        if( $request->form == "account" )
        {
            $ruls["email"]      = "required";
            $ruls["cellphone"]  = "required|unique:users,cellphone";

            if( ($V = validator($data, $ruls))->fails() ) {
                Alert::tag($request->form)->errors($V->errors()->all());
                return back();
            }

            if( $user->update($data) ) {
                Alert::tag($request->form)->success(__('update.successfull'));
                return back();
            }
        } 

        if( $request->form == "info" )
        {
            $ruls["firstname"]  = "required";
            $ruls["lastname"]   = "required";

            if( ($V = validator($data, $ruls))->fails() ) {
                Alert::tag($request->form)->errors($V->errors()->all());
                return back();
            }

            if( $user->update($data) ) {
                Alert::tag($request->form)->success(__('update.successfull'));
                return back();
            }
        }         
    }

}