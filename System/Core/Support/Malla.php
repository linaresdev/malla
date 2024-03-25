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

	public function publicDir() {
		return public_path($this->app("urls")->baseDir());
	}

	public function start()
	{ 
		if(($DB =  $this->app("store"))->has("apps") )
		{
			if( $DB->empty("apps") )
			{ 
				if( ( $app = $DB->getApp("core", "core")) != null )
				{
					return $app->activated;
				}				
			}
		}

		return false;
	}
}