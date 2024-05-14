<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

if( !function_exists("isText") )
{
    function isText( $data ) 
    {
        if( array_key_exists("type", $data) && array_key_exists("label", $data) ) {
            if( ($data["type"] == "text" ) && !empty($data["label"]) ) {
                return true;
            }
        }

        return false;
    }
}

if( !function_exists("isLine") )
{
    function isLine( $data ) 
    {
        if( array_key_exists("type", $data) ) {
            return ($data["type"] == "line" );
        }
        
        return false;
    }
}

if( !function_exists('isSimpleLink') )
{
    function isSimpleLink( $data )
    { 
        $ruls["type"] = ["required", "string", function($attrs, $value, \Closure $fail ){
            if( $value != "link") $fail("Error Type");
        }];
        
        #$ruls["icon"] = "required|string";
        $ruls["url"]  = "required|string";

        $ruls["dropdown"] = [function($attrs, $value, \Closure $fail ){
            if( !empty($value) ) $fail("Is Dropdown");
        }];

        if( validator($data, $ruls)->fails() == true ) {
            return false;
        }

        return true;
    }
}

if( !function_exists("isDropdownLink") )
{
    function isDropdownLink( $data )
    { 
        $ruls["type"] = ["required", "string", function($attrs, $value, \Closure $fail ) {            
            if( $value != "link") $fail("Error Type");
        }];
        
        $ruls["label"]      = "required|string";
        $ruls["url"]        = "required|string";
        $ruls["dropdown"]   = ["required", "array"];

        if( validator($data, $ruls)->fails() == true ) {            
            return false;
        }

        return true;
    }
}