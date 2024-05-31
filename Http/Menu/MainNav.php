<?php
namespace Malla\Http\Menu;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class MainNav
{
    protected $auth;

    protected $request;

    public function __construct( $auth, $request ) {
        $this->auth     = $auth;
        $this->request  = $request;
    }

    public function bootstrapFormat($nav) 
    {
        $nav->styleFilter([
            '{n1}'          => "nav nav-embed",
            "{n2}"          => "dropdown-menu
            ",
            '{item}'        => "nav-item",
            "{dropitem}"    => "nav-item dropdown",
            '{link}'        => "nav-link",
            "{toggle}"      => "nav-link dropdown-toggle px-3",
            "{droplink}"    => "dropdown-item ps-4",  
        ]);
    }

    public function boot( $nav )
    {
        $nav->add("tag", "main-nav");
        $nav->add("description", "Menu Lateral");
        $nav->add("template", "bootstrap"); 
        
        ## Formato
        $this->bootstrapFormat($nav);
        
        ## Items
        $nav->styleFilter([
            //"text-1"    => "link-secondary"
        ]);

        // $nav->addItem(8, function($item){
        //     $item->add("type", "text");
        //     $item->add("label", "Usuarios y Grupos");
        // });
        $nav->addItem(10, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-account-circle");
            $item->add("label", __("words.account"));
            $item->add("url", "admin/users");

            $item->addDropdown(1, function($item) {
                $item->add("type", "link");
                $item->add("icon", "mdi-account");
                $item->add("label", __("words.users"));
                $item->add("url", "admin/users");
            });
            $item->addDropdown(10, function($item) {
                $item->add("type", "link");
                $item->add("icon", "mdi-account-group");
                $item->add("label", __("words.groups"));
                $item->add("url", "admin/users/groups");
            });
        }); 
        // $nav->addItem(12, function($item) {
        //     $item->add("type", "link");
        //     $item->add("icon", "mdi-account-group");
        //     $item->add("label", __("words.groups"));
        //     $item->add("url", "admin/users/groups");
        // });    
    }
}