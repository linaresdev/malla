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
            ## Si $slug es una clase string y $arg es null : Registro de menu

            ## Si $slug es una matrix y $arg es numerico: Registro de menu etiquetado
            if( is_string($slug) && is_array($arg) ) {
                return $this->saveTagFromArray( $slug, $arg );
            }

            ## Si $slug es un string y $arg es un closure : Registro de menu etiquetado
            if( is_string($slug) && ($arg instanceof \Closure) ) {  
                return $this->saveTagFromClosure( $slug, $arg );
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

    public function route( $slug, $arg=12 ) { 
        if( !empty($slug) )
        {
            ## Si $slug es un string y $arg es un closure : Registro de route menu 
            if( is_string($slug) && ($arg instanceof \Closure) ) {  
                return $this->saveRouteFromClosure( $slug, $arg );
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