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

    
    public function tag( $slug, $index=12 )
    {
        if( array_key_exists($slug, $this->taggs) )
        {
            $menu = $this->taggs[$slug];
            $skin = $this->template[$menu->get("template")];
            
            if( class_exists($skin) )
            { 
                return (new $skin($menu))->nav($index);
            }
        }
    }

    public function route( $slug, $index=12 ){}

    

    public function save( $menu=null, $objs=null )
    {
        if( !empty($menu) )
        {
            ## STRING CLASS
            if( is_string($menu) && is_null($objs) ) {
                return $this->saveFromString($menu);
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