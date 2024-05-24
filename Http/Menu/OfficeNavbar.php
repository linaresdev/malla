<?php
namespace Malla\Http\Menu;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class OfficeNavbar {

    protected $auth;

    protected $request;

    public function __construct( $auth, $request ) {
        $this->auth     = $auth;
        $this->request  = $request;
    }

    ## Formato Bootstrap
    public function bootstrapFormat($nav) 
    {
        $nav->styleFilter([
            '{n1}'          => "navbar-nav  ms-auto",
            "{n2}"          => "dropdown-menu dropdown-menu-end",
            '{item}'        => "nav-item",
            "{dropitem}"    => "nav-item dropdown",
            '{link}'        => "nav-link position-relative",
            "{toggle}"      => "nav-link px-3 dropdown-toggle",
            "{droplink}"    => "dropdown-item",     
        ]);
    }

    public function boot( $nav )
    {
        ## Headers
        $nav->add("tag", "office-navbar");
        $nav->add("description", "Office Menu");
        $nav->add("template", "bootstrap");

        ## Formato
        $this->bootstrapFormat($nav);
    }
}