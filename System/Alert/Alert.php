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
        "errors", "danger", "info", "warning", "success"
    ];

    public function __construct($app) {
    }

    // public function form($errors, $view="alert::simpleFormError" )
    // {
    //     if( empty($this->tag) ) {
    //         if( $errors->any() && view()->exists($view) )
    //         {
    //             return view($view);
    //         }

    //         if( session()->has("alert.status") )
    //         {   
    //             if( session()->get("alert.status") )
    //             {
    //                 return view("alert::sessionFlash", session()->get("alert"));
    //             }
    //         }
    //     }
    //     else {
            
    //         if( $errors->any() && view()->exists($view) )
    //         {
    //             return view($view);
    //         }

    //         if( session()->has("alert.status") )
    //         {   
    //             if( session()->get("alert.$this->tag.status") )
    //             {
    //                 return view("alert::sessionFlash", session()->get("alert.$this->tag"));
    //             }
    //         } 
    //     }
    // }

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

            if( $method == "errors" &&  empty($this->tag) ) 
            {
                $data["alert.status"]   = 1;
                $data["alert.type"]     = "danger";
                
                if( is_array($args) ) {
                    foreach($args[0] as $key => $arg ) {
                        $data["alert.message.$key"] = $arg;
                    }
                }
            };

            if( $method == "errors" &&  !empty(($tag = $this->tag)) ) 
            {
                $data["alert.$tag.status"]   = 1;
                $data["alert.$tag.type"]     = "danger";
                
                if( is_array($args) ) {
                    foreach($args[0] as $key => $arg ) {
                        $data["alert.$tag.message.$key"] = $arg;
                    }
                }                
            };

            if( empty(($tag = $this->tag)) )
            {
                $data["alert.status"]   = 1;
                $data["alert.type"]     = $type;
                $data["alert.message"]  = $args[0];                
            }

            if( !empty($tag) && $method != "errors" )
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