<?php
namespace Malla\Http\Menu;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Support\Facades\Auth;

class MainNavbar 
{
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

    public function navNoLoged($nav) 
    {
        ## STYLE
        $nav->styleFilter([
            '{n1}'      => "navbar-nav  ms-auto", 
            '{item}'    => "nav-item",
            '{link}'    => "btn btn-sm rounded-pill mt-1 me-1 px-3",
            "link-1"    => "bg-light link-secondary",
            "link-2"    => "bg-primary-subtle link-secondary"         
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

    public function loadItemNotify( $user, $nav, $position=0 ) 
    {
        $nav->labelFilter("match", [
            "{bell}" => '<span class="badge text-bg-mute link-secondary position-absolute top-0 start-0 rounded-pill border border-light p-1">0</span>',
        ]);

        $nav->addItem($position, function($item)
        {
            $item->add("type", "link");
            $item->add("icon", 'mdi-bell mdi-24px');
            $item->add("label", "{bell}");
            $item->add("url", "notifications");

            $item->addDropdown(1, function($item){
                $item->add("type", "text");
                $item->add("label", "Notificaciones recibidas");
            });

            $item->addDropdown(2, function($item){
                $item->add("type", "blade");
                $item->add("label", "malla::app.news.notify");
            });
        });
    }

    public function loadItemAccount( $user, $nav, $position=0 ) 
    {
        $nav->iconFilter([   
            "{avatar}" => $user->avatar->url        
        ]); 

        $nav->addItem(20, function($item) use ($user) {
            $item->add("type", "link");
            $item->add("icon", '{avatar}');
            $item->add("label", null);
            $item->add("url", "#");

            $item->addDropdown(1, function($item){
                $item->add("type", "link");
                $item->add("icon", "mdi-logout");
                $item->add("label", __("words.logout"));
                $item->add("url", "logout");
            });
        });
    }

    public function boot( $nav )
    {
        $nav->add("tag", "main-navbar");
        $nav->add("description", "Menu principal");
        $nav->add("template", "bootstrap");        

        ## NO LOGED
        if( !$this->auth->check() )  {
            $this->navNoLoged($nav);
        }
        else {
            $user = $this->request->user();
            
            $this->bootstrapFormat($nav);

            ## Personalizando bootstrap
            $nav->styleFilter([
                "dropdown-1"    => "p-1 rounded-top",
                "{header}"      => "dropdown-header",
                "{img-avatar}"  => "avatar avatar-navbar w-40px"       
            ]); 

            ## ITEMS
            $this->loadItemNotify($user, $nav, 10);

            $this->loadItemAccount($user, $nav, 20);            
        }        
    }
}