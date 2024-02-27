<?php
namespace Projet
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Driver {

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
            'type'      => 'package',
            'slug'      => 'cms',
            'driver'    => '\Project\Driver::class',
            'token'     => NULL,
            'activated' => 1
        ];
    }

    public function drivers(){}

    public function handler($app){}

    public function providers() { return []; }
    public function alias() { return []; }

    public function install($app) { }
    public function destroy($app) { }

}