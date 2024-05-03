<?php
namespace Malla\Alert;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Alert {

    protected $tag;

    protected $methods = [
        "danger", "error", "info", "warning", "success"
    ];

    public function __construct($app) {
    }

    public function form( $errors, $view="alert::simpleFormError" )
    {
        if( $errors->any() && view()->exists($view) )
        {
            return view($view);
        }

        if( session()->has("alert.status") )
        {   
            if( session()->get("alert.status") )
            {
                return view("alert::sessionFlash", session()->get("alert"));
            }
        }
    }

    public function tag($slug)
    {
        $this->tag = $slug; return $this;
    }

    public function tagged($slug)
    {
        if( session()->has("alert.$slug.status") )
        {
            if( session()->get("alert.$slug.status") )
            {
                return view("alert::sessionFlash", session()->get("alert.$slug"));
            }
        }
    }

    public function __call($method, $args)
    {
        if( in_array($method, $this->methods) && !empty($args) )
        {   
            $type = $method;
            if( $method == "error") $type = "danger";

            if( empty(($tag = $this->tag)) )
            {
                $data["alert.status"]   = 1;
                $data["alert.type"]     = $type;
                $data["alert.message"]  = $args[0];                
            }

            if( !empty($tag) )
            {
                $data["alert.$tag.status"]   = 1;
                $data["alert.$tag.type"]     = $type;
                $data["alert.$tag.message"]  = $args[0];
            }

            foreach($data as $key => $value ) {
                session()->flash($key, $value);
            }
        }
    }
}