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
            '{link}'        => "nav-link px-3",
            "{toggle}"      => "nav-link px-3 dropdown-toggle",
            "{droplink}"    => "dropdown-item",     
        ]);
    }

    /**
     * 
     */
    public function boot( $nav )
    {
        ## Headers
        $nav->add("tag", "users-nav");
        $nav->add("description", "Nav Users");
        $nav->add("template", "bootstrap");

        ## Formato
        $this->bootstrapFormat($nav);

        $nav->addItem($key=5, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-home");
            $item->add("label", __("words.home"));
            $item->add("url", "{profiler}");
        });

        $nav->addItem($key=7, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-arrow-left-bold");
            $item->add("label", __("words.users"));
            $item->add("url", "admin/users");
        });

        $nav->addItem($key=10, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-key-change");
            $item->add("label", __("update.password"));
            $item->add("url", "{profiler}/update/password");
        });

        $nav->addItem($key=11, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-pencil");
            $item->add("label", __("update.credential"));
            $item->add("url", "{profiler}/update/credential");
        });
    }
}