<?php
namespace Malla;

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
            'name'          => 'Malla',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Modulo de desarrollo corporativo'
        ];
    }

    public function app()
    {
        return [
            'type'      => 'core',
            'slug'      => 'malla',
            'driver'    => '\Malla\Driver::class',
            'token'     => NULL,
            'activated' => 1
        ];
    }

    public function drivers()
    {
        return [];
    }

    public function handler( $app )
    {
    }

    public function providers() 
    { 
        return [
            \Malla\Provider\ServiceProvider::class,
            \Malla\Provider\RouteServiceProvider::class
        ]; 
    }
    public function alias() { return []; }

    public function install($app) { }
    public function destroy($app) { }
}