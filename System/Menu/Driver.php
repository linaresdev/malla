<?php
namespace Malla\Menu;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Driver {

    public function info() {

        return [
            'name'          => 'Menu',
            'author'        => 'Ramon Anulfo Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Librerías de navegación'
        ];
    }

    public function app() {

        return [
            'type'      => 'library',
            'slug'      => 'menu',
            'driver'    => \Malla\Menu\Driver::class,
            'token'     => NULL,
            'activated' => 1
        ];
    }

    public function providers() 
    {
        return [
            \Malla\Menu\Provider\MenuServiceProvider::class,
        ];
    }

    public function alias() 
    { 
        return [
            "Nav" => \Malla\Menu\Facade\Nav::class,
        ]; 
    }

    public function install($app) 
    {
        $app->create($this->app())->addMeta("info", $this->info());
    }

    public function destroy($app) { }

}