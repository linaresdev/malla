<?php
namespace Malla\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Malla\Menu\Facade\Nav;
use Malla\Core\Facade\Malla;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{

    protected $assets = [];

    protected $grammariePath = [];
    
    public function boot( Kernel $HTTP, Translator $LANG )
    {
        $this->http = $HTTP;
        $this->lang = $LANG;
        
        require_once(__path("{http}/App.php"));
    }

    public function register() {
       
    }

    public function getGrammars( $locale=null )
    {          
        if( class_exists( ($store = "\Malla\Locales\\$locale") ) ) {
            return (new $store);
        }
    }

    public function loadGrammary( $LANG )
    {
        $this->app->setLocale(config("malla.locale", "es"));
  
        $locale = config("malla.faker_locale", "es_DO");
  
        if( !empty( ($grammaries = $this->getGrammars($locale))  ) )  {
  
           $header  = $grammaries->header();
           $lines   = $grammaries->lines();
           
           $LANG->addLines( $lines, $header["slug"] );
        }
    }

    public function sourceGrammaries($path)
    {
        if( app("files")->exists( ($file = "$path/".$this->app->getLocale().".php")) )
        {
            $this->grammariesPath[] = $file;

            $locale = app("files")->getRequire($file);
            
            if( !empty($locale->getGrammaries()) )
            {
                $header         = $locale->header();
                $grammaries     = $locale->getGrammaries();

                $this->lang->addLines($grammaries, $header["slug"]);
            }            
        }
    }

    public function loadMiddleware($store)
    {
        ## STARTED
        if( !empty( ($started = $store->start() ) ) ) 
        {
            foreach($started as $middleware ) {
                $this->http->pushMiddleware( $middleware );
            }
        }
  
        ## GROUPS
        if( !empty( ( $groups = $store->groups() ) ) )
        {
            foreach( $groups as $name => $group ) {
                $this->app["router"]->middlewareGroup($name, $group);
            }
        }
  
        ## ROUTES
        if( !empty( ($routes = $store->routes() ) ) )
        {
            foreach($routes as $route => $middleware ) {
                $this->app["router"]->middleware( $route, $middleware );
            }
        }
    }

    public function loadSkin($skin) 
    {
        if( array_key_exists( $skin, ($themes = Malla::module("themes"))) )
        {            
            if( method_exists( ($driver = $themes[$skin]), "load") )
            {
                require_once( $driver->load() );
            }
        }

        

        // if( array_key_exists($skin, ($themes = Malla::module("themes"))) )
        // {
        //     $driver = $themes[$skin];
            
        //     if( is_object($driver) )
        //     {
        //         if( method_exists( $driver, "load" ) )
        //         {     
        //             if( app("files")->exists($driver->load()) )
        //             {
        //                 require_once( $driver->load() );

        //                 if( method_exists($driver, "data") ) 
        //                 {
        //                     $data = $driver->data();

        //                     $data["skin"] = new \Malla\Support\Skin($driver);
    
        //                     $this->app["skin"] = $data["skin"];
                        
        //                     $this->app["view"]->share($data);
        //                 }                        
                        
        //             }                
        //         }
        //     }
        // }        
    }
}