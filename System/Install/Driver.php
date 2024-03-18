<?php
namespace Malla\Install;
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
            'name'          => 'Install',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Modulo de instalcion para Malla'
        ];
    }

    public function app()
    {
        return [
            'type'      => 'package',
            'slug'      => 'install',
            'driver'    => \Malla\Install\Driver::class,
            'token'     => NULL,
            'activated' => 1
        ];
    }

    // public function handler( $app ) {}

    public function providers() { 
        return [
            \Malla\Install\Provider\ServiceProvider::class,
            \Malla\Install\Provider\RouteServiceProvider::class
        ]; 
    }
    public function alias() { return []; }

    // public function install($app) { }
    // public function destroy($app) { }
}