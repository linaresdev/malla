<?php
namespace Malla\Menu\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/


class LoadFromArray {

    protected $nav;

    public function __construct($data) 
    {
        $this->nav = new Nav;
        
            
        if( array_key_exists("tag", $data) ) {
            $this->nav->add("tag", $data["tag"]);
        }
        
        if( array_key_exists("route", $data) ) {
            $this->nav->add("route", $data["route"]);
        }

        if( array_key_exists("groups", $data) ) 
        {
            if( is_array( ( $groups = $data["groups"]) ) ) {
                $this->nav->add( "groups", $data["groups"] );
            }
        }

        if( array_key_exists("description", $data) ) {
            $this->nav->add("description", $data["description"]);
        }

        if( array_key_exists("filters", $data) ) {
            foreach($data["filters"] as $key => $value) {
                $this->nav->addFilter($key, $value);
            }
        }

        if( array_key_exists("items", $data) ) 
        { 
            foreach( $data["items"] as $key => $item ) {
                $this->loadText($key, $item);
                $this->loadLine($key, $item);
                $this->loadLink($key, $item);
            }   
        }        
    }

    public function get( $key ) {
        if( isset($this->{$key}) ) return $this->{$key};
    }    

    public function loadLine( $key, $data )
    {
        if( isLine($data) ) {
            $this->nav->addItem($key, function($nav) use ($data) {
                $nav->add("type", "line");
            });
        }
    }

    public function loadText( $key, $data ) {
        if( isText($data) ) {
            $this->nav->addItem($key, function($nav) use ($data) {
                $nav->add("type", "text");
                $nav->add("label", $data["label"]);
            });
        }
    }

    public function loadLink($key, $item)
    {           
        if( $item["type"] == "link" )
        {
            $this->nav->addItem($key, function($nav) use ($item) {

                if( array_key_exists("icon", $item) ) {
                    $nav->add("icon", $item["icon"]);
                }
                $nav->add("type", "link");
                $nav->add("label", $item["label"]);
                $nav->add("url", $item["url"]);

                if( array_key_exists("dropdown", $item ) ) {
                    if( !empty($item["dropdown"]) ) {

                        foreach( $item["dropdown"] as $k => $dropdown ) {
                            
                            if( isText($dropdown) ) {
                                $nav->addDropdown($k, function($nav) use ($dropdown) {
                                    $nav->add("type", "text");
                                    $nav->add("label", $dropdown["label"]);
                                });
                            }

                            if( isLine($dropdown) ) {
                                $nav->addDropdown($k, function($nav) use ($dropdown) {
                                    $nav->add("type", "line");
                                });
                            }

                            if( $dropdown["type"] == "link" )
                            {  
                                if( isDropdownLink($item) ) {
                                    $nav->addDropdown($k, function($nav) use ($dropdown){
                                        $nav->add("type", "link");
                                        if( array_key_exists("icon", $dropdown) ) {
                                            $nav->add("icon", $dropdown["icon"]);
                                        }
                                        $nav->add("label", $dropdown["label"]);
                                        $nav->add("url", $dropdown["url"]);
                                    });
                                }
                            }
                        }
                    }
                }
            });
        }
        
    }
}