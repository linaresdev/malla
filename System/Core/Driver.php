<?php
namespace Malla\Core;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Driver
{
    public function info()
    {
        return [
            'name'          => 'Core',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Malla Core'
        ];
    }

    public function app()
    {
        return [
            'type'      => 'core',
            'slug'      => 'core',
            'driver'    => \Malla\Core\Driver::class,
            'token'     => NULL,
            "activated" => false
        ];
    }

    public function drivers()
    {
        return [];
    }

    public function handler( $app )
    {
    }

    public function providers() { return []; }
    public function alias() { return []; }

    public function install($app)
    { 
        $app->create($this->app())->addMeta("info", $this->info());        
        (new \Malla\Driver)->install($app);
    }
    
    public function destroy($app) { }
}