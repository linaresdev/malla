<?php
namespace Malla\Alert\Provider;

/*
*---------------------------------------------------------
* ©IIPEC
* Santo Domingo República Dominicana.
*---------------------------------------------------------
*/

use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider 
{
    public function boot() {
        $this->loadViewsFrom( __DIR__.'/../Views', 'alert' );
    }

    public function register() {
        $this->app->bind("Alert", function($app) {
            return new \Malla\Alert\Alert($app);
        });
    }
}