<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

if( !function_exists("isLine") )
{
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
        $ruls["type"] = ["required", "string", function($attrs, $value, \Closure $fail ){
            if( $value != "link") $fail("Error Type");
        }];
        
        #$ruls["icon"] = "required|string";
        $ruls["url"]  = "required|string";

        $ruls["dropdown"] = ["array"];

        if( validator($data, $ruls)->fails() == true ) {            
            return false;
        }

        return true;
    }
}