<?php
namespace Malla\Menu;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Menu\Support\Menu;

class Nav extends Menu 
{     
    public function tag( $slug=null, $arg=null )
    {
        if( !empty($slug) )
        { 
            ## Si $slug es un string y $arg es un closure : Registro de menu etiquetado
            if( is_string($slug) && ($arg instanceof \Closure) ) {  
                if( array_key_exists($slug, $this->taggs) ) {                    
                    $arg( ($nav = $this->taggs[$slug]) );
                }
            }

            ## Si $arg es numerico: Solicitud de menu etiquetado
            if( is_string($slug) && is_numeric($arg) )
            {               
                if( array_key_exists($slug, $this->taggs) )
                { 
                    $menu = $this->taggs[$slug];
                    $skin = $this->template[$menu->get("template")];
                   
                    if( class_exists($skin) ) {
                        return (new $skin($menu))->nav($arg);
                    }
                }
            }
        }
    }

    public  function taggs( $slug=null, $intex=4 )
    {
        $collect = null;

        if( array_key_exists( $slug, $this->containers ) ) 
        {
            if( !empty( ($taggs = $this->containers[$slug]->navs("taggs")) ) ) {
               
                foreach( $taggs as $tag ) {
                    dd($this->tag($slug, 4));
                    $collect .= $this->tag($slug, 4);
                }
            }
        }

        return $collect;
    }

    public function route( $slug=null, $arg=null ) { 
        if( !empty($slug) )
        {
            ## Si $arg es numerico: Solicitud de menu etiquetado
            if( is_numeric($slug) )
            { 
                foreach( $this->routes as $route => $nav ) {
                    if( \Str::is( $route, request()->path() ) ) {
                        $skin = $this->template[$nav->get("template")];
                    
                        if( class_exists($skin) ) {
                            return (new $skin($nav))->nav($arg);
                        }
                    }
                }
            }

            if( is_string($slug) && ($arg instanceof \Closure) ) {  
                if( array_key_exists($slug, $this->routes) ) {                    
                    $arg( ($nav = $this->routes[$slug]) );
                }
            }            
        }
    } 
    
    public  function routes($slug=null, $index=4)
    {
        if( array_key_exists($slug, $this->containers) )
        {
            if( !empty( ($routes = $this->containers[$slug]->routes()) ) )
            {
                $navigator = null;

                foreach( $routes as $route ) {
                    if( \Str::is($route, request()->path()) )
                    {
                        $nav    = $this->routes[$route];
                        $skin   = $this->template[$nav->get("template")];
                    
                        if( class_exists($skin) ) {
                            $navigator .=  (new $skin($nav))->nav($index);
                        } 
                    }
                }

                return $navigator;
            }
        }
    }

    public function save( $menu=null, $objs=null )
    {
        if( !empty($menu) )
        {
            ## STRING CLASS
            if( is_string($menu) && is_null($objs) ) {
                return $this->saveFromClassString($menu);
            }
            ## ARRAY
            if( is_array($menu) ) {
                return $this->saveFromArray($menu);
            }
            ## CLOSURE
            if( is_string($menu) && ($objs instanceof \Closure) ) {  
                return $this->saveFromClosure( $menu, $objs );
            }
            ## OBJECT
            if( is_object($menu) ) {
                return $this->saveFromObject($menu);
            }
            ## JSON
            if( is_json($menu) ) {
                return $this->saveFromJson($menu);
            }
        }
    }

    
}