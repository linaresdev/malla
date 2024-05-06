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
            'description'   => 'Librarías de navegacion'
        ];
    }

    public function app() {

        return [
            'type' => 'library',
            'slug' => 'menu',
            'driver' => \Malla\Menu\Driver::class,
            'token' => NULL,
            'activated' => 1
        ];
    }

    public function handler( $app )
    {
        $app->bind("Nav", function($app){
            return new \Malla\Menu\Support\Nav($app);
        });
    }

    public function alias() { 
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