<?php
namespace Malla\Moon\Http\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Core\Support\BootLoader;

class Moon
{
    private static $app;

    public function __construct( $app )
    {
        self::$app = $app;
    }

    public function load($app=NULL, $args=[], $params=[])
    {
        return self::$app->load( $this, $app, $args, $params );
    }
}