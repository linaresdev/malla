<?php
namespace Malla\Alert;
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
            'name'          => 'Alert',
            'author'        => 'Ramon A Linares Febles',
            'email'         => 'linareslf@gmail.com',
            'license'       => 'Mit',
            'support'       => 'https://support.lc',
            'version'       => 'V-0.0',
            'description'   => 'Librarías de alertas y notificaciones'
        ];
    }

    public function app() 
    {
        return [
            'type'          => 'library',
            'slug'          => 'alert',
            'driver'        => \Malla\Alert\Driver::class,
            'token'         => NULL,
            'activated'     => 1
        ];
    }

    // public function handler( $app ) 
    // {
    //     $app->bind("Alert", function($app) {
    //         return new \Malla\Alert\Alert($app);
    //     });
    // }

    public function providers()
    {
        return [
            \Malla\Alert\Provider\AlertServiceProvider::class,
        ];
    }

    public function alias() { 
        return [
            "Alert" => \Malla\Alert\Facade\Alert::class,
        ];
    }

    public function install($app) 
    {
        $app->create($this->app())->addMeta("info", $this->info());
    }

    public function destroy($app)
    {
        if( ($library = $app->library("alert")) != null )
        {
            $library->delete();
        }
    }
}