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

    public function has() {
        return ( !empty($this->stors) );
    }

    public function navs( $slug=null) {
        if( array_key_exists($slug, $this->stors) ) {
            return $this->stors[$slug];
        }
    }

    public function tag($slug){
        $this->stors["taggs"][] = $slug;
    }

    public function route($slug){
        $this->stors["routes"][] = $slug;
    }
    public function routes() {
        if( array_key_exists("routes", $this->stors) ) {
            return $this->stors["routes"];
        }
    }

    public function addStore( $key=null, $nav=null ) {
        $this->store[$key][] = $nav->get($key);
    }
}