<?php
namespace Malla\Menu\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Container 
{
    protected $name;

    protected $slug;

    protected $stors = [];

    public function __construct( $slug, $name="Empty Name" ) {        
        $this->name = $name;
        $this->slug = $slug;
    }

    public function has($name) {
        if( array_key_exists($name, $this->store) ) {

        }
    }

    public function addStore( $key=null, $nav=null ) {
        $this->store[$key][] = $nav->get($key);
    }
}