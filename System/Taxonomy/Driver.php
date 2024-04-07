<?php
namespace Malla\Taxonomy;

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
            'name'          => 'Taxonmy',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Clacificacion de modulos y contenido'
        ];
    }

    public function app() {

        return [
            'type'          => 'library',
            'slug'          => 'taxonomy',
            'driver'        => \Malla\Taxonomy\Driver::class,
            'token'         => \Str::random(12),
            'activated'     => 1
        ];
    }

    public function providers() { return []; }
    public function alias() { return []; }

    public function install($app) {
        $app->create($this->app())->addMeta("info", $this->info());
    }

    public function destroy($app) {
        
    }

}