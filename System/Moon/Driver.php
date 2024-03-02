<?php
namespace Malla\Moon;
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
            'name'          => 'Moon',
            'author'        => 'Ramon Anulfo Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Description'
        ];
    }
    public function app() 
    {
        return [
            'type'          => 'theme',
            'slug'          => 'moon',
            'driver'        => \Malla\Moon\Driver::class,
            'serial'        => NULL,
            'activated'     => 1
        ];
    }

    public function load() {
        return __DIR__."/Http/App.php";
    }

    public function install($app) { }
    public function destroy($app) { }
}