<?php
namespace Malla\Http\Controllers\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Http\Supports\Admin\HomeSupport;

class HomeController extends Controller 
{
    public function __construct( HomeSupport $app )
    {
        $this->boot($app);
    }

    public function index() {
        return $this->render('home', $this->app->index());
    }
}