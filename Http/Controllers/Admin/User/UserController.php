<?php
namespace Malla\Http\Controllers\Admin\User;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Malla\Http\Supports\Admin\UserSupport;

class UserController extends Controller {

    public function __construct( UserSupport $app ) {
        $this->boot($app);
    }

    public function index() {
        return $this->render('home', $this->app->index($this->user()));
    }
    
    public function search( $data=null ) {        
        return $this->render(
            'partial.search', $this->app->search(request()->user(), $data, 10)
        );
    }

    public function settingUserList($opt) {
        return $this->app->settingUserList($opt);
    }

    public function postUpdateState( $user, Request $request ) {
        return $this->app->postUpdateState($user, $request);
    }
}