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
            'description'   => 'Plantilla por defecto para malla'
        ];
    }

    public function app() 
    {
        return [
            'type'          => 'theme',
            'slug'          => 'moon',
            'driver'        => \Malla\Moon\Driver::class,
            'serial'        => \Str::random(12),
            'activated'     => 1
        ];
    }

    public function data()
    {
        return [
            "title"     => "Moon Design",
            "lang"      => app()->getLocale(),
            "charset"   => "UTF-8",
            "container" => "container",
            "wrapp"     => 'col-lg-6 offset-lg-6 col-md-10 offset-md-1 col-sm-12 py-5'
        ];
    }

    public function load() {
        return __DIR__."/Http/App.php";
    }

    public function install($app) {
        $app->create($this->app())->addMeta("info", $this->info()); 
    }
    
    public function destroy($app) { }
}