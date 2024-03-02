<?php
namespace Malla\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Skin {

   public $name = 'One Theme';

   protected $slug;

   protected $resources = [];

   protected $domain;

   protected $theme;

   public function __construct( $skin=null ) {
        
   }

   public function skin() {
      return $this->theme;
   }

   public function getSlug() {
      return $this->slug;
   }

   public function getPath($key=null) {
      if( array_key_exists( $key, $this->resources ) ) {
         return $this->resources[$key];
      }
   }

   public function path($uri="index") {
      return "$this->slug::$uri";
   }

   public function view($view=NULL, $data=[], $mergeData=[]) {

		if( view()->exists( ($path = $this->path($view)) ) ) {
			return view($path, $data, $mergeData);
		}

		return "ERROR 404 :: La vista {$path} no existe.";
	}
}