<?php
namespace Malla\Menu\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Nav 
{
    public $type;

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
        if( isset($this->{$key}) )
        {
            return $this->{$key};
        }
    }

    public function iconFilter($index, $data=[])
    {
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

    public function addText($text)
    {

    }

    public function addLine()
    {

    }

    public function addItem($index, $nav=null)
    {
        ## FROM CUSTOM KEY
        if( (is_numeric($index) && !empty($nav)) && is_array($nav) )
        {
            
            $nav["type"]            = "link";
            $this->items[$index]    = $nav;
        }
        ## FROM CUSTOM KEY AND CLOSURE        
        if( is_numeric($index) && ($nav instanceof \Closure ) ) {
            $item = new Item();
            
            $nav( $item );

            $this->items[$index] = $item;   
            ksort($this->items);      
        }
        ## FROM DINAMIC KEY
        if( is_array($index) && !empty($index) )
        {
            $this->items[] = $index;
        }
    }
}