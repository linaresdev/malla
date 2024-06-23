<?php
namespace Malla\Http\Controllers\Admin\User;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Malla\Http\Supports\Admin\UserSupport;
use Malla\Http\Requests\Admin\User\UpdateCredential;

class UserController extends Controller {

    public function __construct( UserSupport $app ) {
        $this->boot($app);
    }

    public function index() {
        return $this->render('home', $this->app->index($this->user()));
    }
    
    public function search( $data=null ) {        
        return $this->render(
            'partial.search', $this->app->search( $data )
        );
    }

    public function settingUserList($opt) {
        return $this->app->settingUserList($opt);
    }

    public function postUpdateState( $user, Request $request ) {
        return $this->app->postUpdateState($user, $request);
    }

    public function profile( $user ) {
        return $this->render( "profile.home", $this->app->profile($user) );        
    }

    ## MANTENANCE
    public function getUpdatePassword( $user ) {
        return $this->render( 
            "profile.update.password", 
            $this->app->profile($user) 
        );        
    }

    public function postUpdatePassword( $user, Request $request ) {
        return $this->app->updatePassword( $user, $request );
    }

    public function getUpdateCredential( $user ) {
        return $this->render( 
            "profile.update.credential", 
            $this->app->profile($user) 
        );        
    }

    public function postUpdateCredential( $user, Request $request ) {
        return $this->app->updateCredential($user, $request);
    }
}