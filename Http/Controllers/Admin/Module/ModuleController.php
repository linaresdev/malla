<?php
namespace Malla\Http\Controllers\Admin\Module;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Http\Supports\Admin\ModuleSupport;

class ModuleController extends Controller {

    public function __construct( ModuleSupport $app ) {
        $this->boot($app);
    }

    public function index() {
        return $this->render('home', $this->app->index());
    }
}