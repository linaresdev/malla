<?php
namespace Malla\Http\Controllers;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Http\Supports\GetMembership;

class GetMembershipController extends Controller {

    public function __construct( GetMembership $app )
    {
        $this->boot($app);
    }

    public function index()
    {
        return $this->render('getmembership', $this->app->data());
    }
}