<?php
namespace Malla\Http\Controllers;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Malla\Http\Supports\Auth;
use Malla\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function __construct( Auth $app )
    {
        $this->boot($app);
    }

    public function index() {
        return $this->render( "auth", $this->app->index() );
    }

    public function logon( LoginRequest $request )
    {
        return $this->app->logon( $request );
    }

    public function logout( Request $request )
    {
        $user = $request->user();

        auth()->logout();

        return redirect("/");
    }
}