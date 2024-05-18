<?php
namespace Malla\Http\Menu\Web;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Support\Facades\Auth;

class MainNavar {

    protected $auth;

    protected $request;

    public function __construct( $auth, $request ) {
        $this->auth     = $auth;
        $this->request  = $request;
    }

    public function boot( $nav )
    {
        $nav->add("tag", "main-navbar");
        $nav->add("description", "Menu principal");
        $nav->add("template", "bootstrap");

        

        ## NO LOGED
        if( !$this->auth->check() )
        {
            ## STYLE
            $nav->styleFilter([
                '{n1}'      => "navbar-nav  ms-auto", 
                '{item}'    => "nav-item",
                '{link}'    => "btn btn-sm bg-light-subtle link-success rounded-pill mt-1 me-1 px-3",         
            ]);

            $nav->addItem(10, function($item) {
                $item->add("type", "link");
                $item->add("icon", "mdi-gift");
                $item->add("label", __("auth.getmembership"));
                $item->add("url", "getmembership");
            });

            $nav->addItem(20, function($item) {
                $item->add("type", "link");
                $item->add("icon", "mdi-login");
                $item->add("label", __("auth.login"));
                $item->add("url", "login");
            });
        }
        
    }
}