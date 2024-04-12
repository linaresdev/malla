<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

/*
* CONFIGS */
$SKIN = config("app.skin");

## URLS
Malla::addUrl([
    "{mainbar}" => "/",
    "{current}" => request()->path()
]);

/*
* LANGUAGE */
//$this->loadGrammary( $LANG );
$this->loadGrammary( $LANG );

## DATABASE
$this->loadMigrationsFrom( __path("{migrations}") );

/*
* MIDDLEWARES */
$this->loadMiddleware(new \Malla\Http\Middlewares\Handler());

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'malla');

/*
* SKIN */
if( array_key_exists( $SKIN, ($themes = Malla::module("themes"))) )
{            
    if( method_exists( ($driver = $themes[$SKIN]), "load") )
    {
        $data           = $driver->data();
        $data["skin"]   = new \Malla\Support\Skin($driver);        

        require_once( $driver->load() ); 

        $this->app["view"]->share($data);       
    }
}

/*
* ADMIN PUBLISHER */
$this->publishes($this->assets, "malla");

/*
* SHARE */
//$this->app["view"]->share($data);

// $user = (new \Malla\User\Model\Store)->create([
//     'name'      => "Ramon",
//     "firstname" => "Ramon Anulfo",
//     "lastname"  => "Linares Febles",
//     "email"     => "linareslf@gmail.com",
//     "password"  => \Hash::make("linaresfebles"),    
// ]);
// $term = (new \Malla\Model\Term)->create([
//     "slug" => "uncategory",
//     "name"  => "Sin Categoria",
// ]);


//$user = (new \Malla\User\Model\Store)->find(1);

//$term = (new \Malla\Model\Term)->find(1);

//dd($term);
// $term->createTaxonomy([
//     "taxonomy"      => "category",
//     "description"   => "Sin Categoria"
// ]);

// $post = (new \Malla\Model\Post)->create([
//     "author" => $user->id,    
// ]);