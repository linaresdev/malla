<?php
namespace Malla\Menu\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Nav 
{
    public $tag;

    public $route;

    public $groups = [];

    public $description;

    public $filters = [
        "icons" => [],
        "urls"  => [],
        "label" => [
            "match" => [],
            "dress" => []
        ],
        "style" => []
    ];

    public $template = "bootstrap";

    public $items;

    public function add($key, $value)
    {         
        $this->{$key} = $value;        
    }

    public function get($key=null)
    {
        if( isset($this->{$key}) ) {
            return $this->{$key};
        }
    }

    public function group($slug)
    {
        if( !array_key_exists($slug, $this->groups) ) {
            $this->groups[] = $slug;
        }
    }

    public function addFilter($key, $data) {
        foreach($data as $k => $value ) {
            $this->filters[$key][$k] = $value;
        }
    }

    public function iconFilter( $data=[] )
    {
        $this->filters["icons"] = array_merge( $this->filters["icons"] , $data );
        //$this->filters["icons"][$index] = array_merge($this->filters["icons"][$index], $data);
    }
    public function labelFilter($index, $data=[])
    {
        $this->filters["label"][$index] = array_merge($this->filters["label"][$index], $data);
    }
    public function urlFilter($data=[])
    {
        $this->filters["urls"] = array_merge( $this->filters["urls"] , $data );
    }
    public function styleFilter($data=[])
    {
        $this->filters["style"] = array_merge( $this->filters["style"] , $data );
    }

    public function item($key=null, $closure=null)
    {
        if( is_numeric($key) && ($closure instanceof \Closure ) )
        {
            if( array_key_exists($key, $this->items) )
            {
                $closure( ($nav = $this->items[$key]) );
            }            
        }
    }

    public function addItem($index, $nav=null)
    {
        ## FROM CUSTOM KEY
        if( (is_numeric($index) && !empty($nav)) && is_array($nav) ) {            
            $nav["type"]            = "link";
            $this->items[$index]    = $nav;
        }
        ## FROM CUSTOM KEY AND CLOSURE        
        if( is_numeric($index) && ($nav instanceof \Closure ) )
        {
            $item = new Item();
            
            $nav( $item );

            $this->items[$index] = $item;   
            ksort($this->items);      
        }
        ## FROM DINAMIC KEY
        if( is_array($index) && !empty($index) ) {
            $this->items[] = $index;
        }
    }

    public function updateItem( $key, $item=null ) {
        if( array_key_exists($key, $this->items) && ($item instanceof \Closure ) ) {
            $data = $this->items[$key];
            $item($data);

        }
    }

    public function deny($key=null) {
        if( array_key_exists($key, $this->items) ) {
            $this->items[$key]->update(["type" => "lock"]);
        }
    }
}