<?php
namespace Malla\Http\Controllers\Admin\User;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/


use Malla\Http\Supports\Admin\UserSupport;

class UserController extends Controller {

    public function __construct( UserSupport $app ) {
        $this->boot($app);
    }

    public function index() {
        return $this->render('home', $this->app->index());
    }
}