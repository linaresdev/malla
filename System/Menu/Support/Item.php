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
    // public $icon;
    // public $label;
    // public $url;
    // public $dropdown;
    // public $paragraph;
    

    public function toArray()  {
        return (array) $this;
    }

    public function add( $key, $value ) 
    {
        if( !isset($this->{$key}) ) {
            $this->{$key} = $value;
        }
    }

    public function line() {
        $this->add("type", "line");
    }

    public function text( $data ) {
        $this->add("type", "text");
        $this->label = $data;
    }

    public function header($title) {
        $this->add("type", "text");
        $this->text = $title;
    }

    public function addDropdown( $key=0, $nav=null )
    {
        ## FROM CUSTOM KEY AND CLOSURE        
        if( $nav instanceof \Closure )
        {
            $item = new Item();
            $nav( $item );
            $this->dropdown[$key] = $item;

            ksort($this->dropdown);
        }
    }
}