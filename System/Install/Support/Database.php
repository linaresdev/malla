<?php
namespace Malla\Install\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Model\App;
use Malla\Core\Facade\Malla;
use Illuminate\Support\Facades\Schema;

class Database
{
    protected $libraries = [
        \Malla\Core\Driver::class,
    ];

    public function __construct()
    {        
    }

    public function data() {

        $data['title'] = __("Base de datos");

        $data["mallaStart"] = Malla::start();

        if( Malla::app("store")->has("apps") )
        {
            $data["apps"] = (new App)->paginate(10);
        }
        
        $data["icon"] = (function($slug)
        {
            $data['core']       = 'mdi-heart-pulse';
            $data["library"]    = "mdi-shape-outline";
            $data['package']    = 'mdi-package-variant-closed';
            $data['theme']      = 'mdi-format-paint';


            if( array_key_exists($slug, $data) )
            {
                return '<span class="mdi '.$data[$slug].' mdi-24px"></span>';
            }

            return $slug;
        });
       
        return $data;
    }

    public function migrate( $slug=null )
    {
        
        if( method_exists($this, $slug) )
        {
            $this->{$slug}();
        }

        return back();
    }

    public function install()
    {
        \Artisan::call("migrate");
        
        $this->saveLibraries();
    }

    public function saveLibraries()
    {
        foreach( $this->libraries as $library ) 
        {
            if( class_exists($library) )
            {
                if( method_exists(($lib = new $library), "install") )
                {
                    $lib->install(new App);
                }
            }
        }
    }

    public function reset()
    {
        \Artisan::call("migrate:reset");

        return back();
    }

    public function refresh()
    {
        \Artisan::call("migrate:refresh");
        $this->saveLibraries();
    }
}