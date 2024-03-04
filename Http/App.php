<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

/*
* CONFIGS */

/*
* LANGUAGE */
//$this->loadGrammary( $LANG );
$this->loadGrammary( $LANG );


/*
* MIDDLEWARES */
$this->loadMiddleware(new \Malla\Http\Middlewares\Handler());

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'malla');

/*
* SKIN */
$data['skin'] = $this->loadSkin(\Malla\Moon\Driver::class);

/*
* ADMIN PUBLISHER */
$this->publishes($this->assets, "malla");

/*
* SHARE */
$this->app["view"]->share($data);
