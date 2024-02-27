<?php
namespace Malla\Core\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Malla 
{
    protected static $app;

    public function __construct( $app ) {
		self::$app = $app;
	}
    public function app( $key=NULL, $args=[], $params=[] ) {
		return self::$app->load( $this, $key, $args, $params );
	}
    
    public function addUrl($taggs=[]) {
		return $this->app("urls")->addTag("urls", $taggs);
	}

    public function addPath($taggs=[]) {
		return $this->app("urls")->addTag("paths", $taggs);
	}
}