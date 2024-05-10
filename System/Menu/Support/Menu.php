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

    ## SAVE FROM STRING
    public function saveFromString($menu)
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
    }

    ## SAVE FROM CLOSURE
    public function saveFromClosure( $menu, $closure )
    {
    }

    ## SAVE FROM OBJECT
    public function saveFromObject( $menu )
    {
        if( method_exists($menu, "boot") )
        {   
            $nav        = new \Malla\Menu\Support\Nav();

            $menu->boot( $nav );

            if( isset($nav->tag) )
            {
                if( !empty( ($tag = $nav->tag) ) )
                {
                    $this->taggs[$tag] = $nav;
                }
            }
            
            if( isset($nav->route) )
            {
                if( !empty( ($route = $nav->route) ) )
                {
                    $this->routes[$route] = $nav;
                }
            }  
        }
    }
}