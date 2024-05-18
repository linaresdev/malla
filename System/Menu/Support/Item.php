<?php
namespace Malla\Menu\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Item
{
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

    public function update( $key=null, $value=null ) 
    {
        if( !empty($key) )
        {
            if( is_array($key) ) {
                foreach( $key as $k => $v ) {
                    $this->{$k} = $v;
                } 
            }
            if( (is_numeric($key) && is_array($value)) && isset($this->dropdown) )
            {
                if( array_key_exists($key, $this->dropdown) ) {
                    $this->dropdown[$key]->update($value);
                }
            }
        }
    }

    public function locked($key=null) 
    {
        if( is_null($key) ){
            $this->update(["type" => "locked"]);
        }
        if(is_numeric($key))
        {
            if( array_key_exists($key, $this->dropdown) ) {
                $this->dropdown[$key]->update(["type" => "locked"]);
            }
        }
    }
}