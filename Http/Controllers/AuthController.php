<?php
namespace Malla\Http\Controllers;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Http\Supports\Auth;

class AuthController extends Controller
{
    public function __construct( Auth $app )
    {
        $this->boot($app);
    }

    public function index() {
        return $this->render('auth', $this->app->index());
    }
}