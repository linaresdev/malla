<?php
namespace Malla\Http\Menu\Admin;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class UserNav 
{
    public function boot($nav)
    {
        $nav->add("tag", "admin-users-nav");
        $nav->add("route", "admin/users/*");
        $nav->add("description", "Admin Users Menu");
        $nav->add("template", "bootstrap");

        $nav->iconFilter("replace", [   
            "account" => '<span class="mdi mdi-account"></span>'         
        ]);

        $nav->iconFilter("dress", [   
            "account" => '<div class="icon"> <span class="mdi mdi-account"></span> </div>'         
        ]);

        $nav->urlFilter([   
            "{username}" => "rlinares"         
        ]);        

        $nav->labelFilter("match", [   
            "{name}" => 'Ramon A Linares'         
        ]);   
        
        $nav->labelFilter("dress", [   
            "{username}" => '<span class="text-toggle">{username}</span>'         
        ]);

        $nav->labelFilter("match", [   
            "{username}" => 'Ramon Anulfo Linares'         
        ]); 

        $nav->styleFilter([
            "{n1}"          => "navbar-nav bg-white my-3 flex-column rounded-1 px-3",
            "{n2}"          => "dropdown-menu",
            "{item}"        => "nav-item",
            "{dropitem}"    => "nav-item dropdown",
            "{link}"        => "nav-link",
            "{droplink}"    => "dropdown-item",
        ]);

        $nav->addItem(30, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-account");
            $item->add("label", "{username}");
            $item->add("url", "profiler/{user}");
        });

        // $nav->addItem(31, function($item){
        //     $item->add("type", "text");
        //     $item->add("text", "Header de los Link");
        // });

        // $nav->addItem(32, function($item){
        //     $item->add("type", "line");
        // });

        $nav->addItem(33, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-account");
            $item->add("label", "{name}");
            $item->add("url", "admin/users");

            $item->addDropdown(1, function($item){
                $item->add("type", "link");
                $item->add("icon", "mdi-bell");
                $item->add("label", "words.blog");
                $item->add("url", "blog");
            });

            $item->addDropdown(2, function($item){
                $item->add("type", "line");
            });
            
            $item->addDropdown(3, function($item){
                $item->add("type", "link");
                $item->add("icon", "mdi-logout");
                $item->add("label", "words.logout");
                $item->add("url", "logout");
            });
        });

        // $nav->addItem(30, function( $auth, $request ) {
        //     return [
        //         "type"  => "link",
        //         "icon"  => "mdi-account",
        //         "label" => "{name}",
        //         "url"   => "admin/users"
        //     ];
        // });

        // $nav->addItem(31, function( $auth, $request ) {
        //     return [
        //         "type"  => "link",
        //         "icon"  => "mdi-account",
        //         "label" => "{username}",
        //         "url"   => [
        //             [
        //                 "type"  => "link",
        //                 "icon"  => "mdi-account-multiplex",
        //                 "label" => "words.users",
        //                 "url"   => "admin/users"
        //             ]
        //         ]
        //     ];
        // });
     }
}