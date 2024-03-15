<?php
namespace Malla\User;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Driver {

    public function info() {

        return [
            'name'          => 'User',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Libraria de usuarios'
        ];
    }

    public function app() {

        return [
            'type'          => 'library',
            'slug'          => 'users',
            'driver'        => \Malla\User\Driver::class,
            'serial'         => NULL,
            'activated'     => 1
        ];
    }

    public function drivers()
    {
        return [
        ];
    }

    public function handler( $app )
    {
    }

    public function providers() { return []; }
    public function alias() { return []; }

    public function install($app) { }
    public function destroy($app) { }

}