<?php
namespace Malla\Menu\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Menu
{
    protected $taggs        = [];

    protected $routes       = [];

    protected $containers   = [];

    protected $template     = [
        "bootstrap"         => \Malla\Menu\Template\Bootstrap::class,
    ];

    public function app() 
    {
        return $this;
    }

    public function makeSure( $menu )
    {
        if( is_string($menu) ) {
            if( class_exists($menu) ){
                return new $menu;
            }
        }

        if( is_object($menu) ) {
            return $menu;
        }

        return null;
    }

    public function container( $name )
    {
        if( !array_key_exists( ($slug = \Str::slug($name)), $this->containers) )
        {
            $this->containers[$slug] = new \Malla\Menu\Support\Container( $slug, $name );
        }
    }

    public function saveInGroupFrom( $type, $nav ) 
    {
        if( is_object($nav) ) 
        {
            foreach( $nav->get("groups") as $group ) {
                $this->containers[$group]->addStore($type, $nav);
            }
        }
    }

    ## SAVE FROM STRING
    public function saveFromClassString($menu)
    { 
        if( is_string($menu) ) {
            if( class_exists($menu) ){
                return $this->saveFromObject( new $menu );
            }
        }
    }

    ## SAVE FROM ARRAY
    public function saveFromArray( $menu ) 
    {
        $nav = (new \Malla\Menu\Support\LoadFromArray($menu))->get("nav");

        if( !empty($nav->tag) ) {
            $this->taggs[$nav->tag] = $nav;            
            $this->saveInGroupFrom("tag", $nav);
        }

        if( !empty($nav->route) ) {
            $this->routes[$nav->route] = $nav;
            $this->saveInGroupFrom("route", $nav);
        }
    }

    // public function saveTagFromArray( $tag, $menu ) {        
    //     $this->taggs[$tag] = new \Malla\Menu\Support\Nav($menu);
    // }

    ## SAVE FROM CLOSURE
    public function makeInstaceFromClosure( $type, $alia, $closure ) {
        ($nav = new \Malla\Menu\Support\Nav())->add($type, $alia, $alia);
        $closure($nav);

        return $nav;
    }

    public function saveTagFromClosure( $alia, $closure )
    {
        $nav = $this->makeInstaceFromClosure(
            "tag", $alia, $closure
        );
        
        $this->taggs[$nav->tag] = $nav;        
    }

    public function saveRouteFromClosure( $alia, $closure )
    {
        $nav = $this->makeInstaceFromClosure(
            "route", $alia, $closure
        );
        
        $this->routes[$nav->route] = $nav; 
    }

    ## SAVE FROM OBJECT
    public function saveFromObject( $menu )
    {
        if( method_exists($menu, "boot") )
        {   
            $nav        = new \Malla\Menu\Support\Nav();

            $menu->boot( $nav );

            if( isset($nav->tag) ) {
                if( !empty( ($tag = $nav->tag) ) ) {
                    $this->taggs[$tag] = $nav;
                }
            }
                
            if( isset($nav->route) ) {
                if( !empty( ($route = $nav->route) ) ) {
                    $this->routes[$route] = $nav;
                }
            }   
        }
    }
}