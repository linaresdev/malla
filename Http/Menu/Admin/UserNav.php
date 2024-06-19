<?php
namespace Malla\Http\Menu\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class UserNav {

    protected $auth;

    protected $request;

    public function __construct(  ) {
    }

    ## Formato Bootstrap
    public function bootstrapFormat($nav) 
    {
        $nav->styleFilter([
            '{n1}'          => "navbar-nav  ms-auto",
            "{n2}"          => "dropdown-menu dropdown-menu-end",
            '{item}'        => "nav-item border-bottom",
            "{dropitem}"    => "nav-item dropdown",
            '{link}'        => "nav-link position-relative",
            "{toggle}"      => "nav-link px-3 dropdown-toggle",
            "{droplink}"    => "dropdown-item",     
        ]);
    }

    public function boot( $nav )
    {
        ## Headers
        $nav->add("tag", "users-nav");
        $nav->add("description", "Nav Users");
        $nav->add("template", "bootstrap");

        ## Formato
        $this->bootstrapFormat($nav);

        $nav->addItem($key=2, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-account");
            $item->add("label", "update.password");
            $item->add("url", "profiler/{usrID}/update/password");
        });
    }
}