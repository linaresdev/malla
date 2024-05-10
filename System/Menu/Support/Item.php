<?php
namespace Malla\Menu\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Item
{
    public $type;
    public $icon;
    public $label;
    public $url;
    public $dropdown;
    public $text;

    public function toArray()  {
        return (array) $this;
    }

    public function add( $key, $value ) 
    {
        if( !isset($this->{$key}) ) {
            $this->{$key} = $value;
        }
    }

    public function addDropdown( $key=0, $nav=null )
    {
        ## FROM CUSTOM KEY AND CLOSURE        
        if( $nav instanceof \Closure )
        {
            $item = new Item();
            $nav( $item );
            $this->dropdown[$key] = $item;
        }
    }
}