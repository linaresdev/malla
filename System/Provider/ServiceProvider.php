<?php
namespace Malla\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{

    protected $assets = [];
    
    public function boot( Kernel $HTTP, Translator $LANG ) {
        require_once(__path("{http}/App.php"));
    }

    public function register() {}

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
        if( is_string($skin) )
        {
            if( class_exists($skin) ) {
                $skin = new $skin();
            }
        }

        if( is_object($skin) )
        {
            if( method_exists( $skin, "load" ) )
            {  
                if( app("files")->exists($skin->load()) )
                {
                    require_once( $skin->load() );

                    $data["skin"] = new \Malla\Support\Skin($skin);

                    if( method_exists($skin, "data") )
                    {
                        $data = array_merge($data, $skin->data());
                    }
                    
                    $this->app["view"]->share($data);
                }                
            }
        }
    }
}