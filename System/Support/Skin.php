<?php
namespace Malla\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Skin
{
   protected $slug;

   protected $theme;

   public function __construct( $skin=null )
   {
      $this->theme   = $skin->app();
      $this->slug    = $this->theme["slug"];
   }

   public function info() 
   {
      return $this->theme;
   }

   public function getSlug() 
   {
      return $this->slug;
   }

   public function path($uri="index") 
   {
      return "$this->slug::$uri";
   }

   public function view($view=NULL, $data=[], $mergeData=[])
   {
		if( view()->exists( ($path = $this->path($view)) ) ) {
			return view($path, $data, $mergeData);
		}

		return "ERROR 404 :: La vista {$path} no existe.";
	}
}