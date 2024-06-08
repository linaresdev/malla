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
        return $this->render('home', $this->app->index());
    }

    public function postUpdateState( $user, Request $request ) {
        return $this->app->postUpdateState($user, $request);
    }
}