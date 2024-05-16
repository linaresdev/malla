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

$this->assets[__path("{system}/Assets")] = __path("{cdn}");

/*
* ADMIN PUBLISHER */
$this->publishes($this->assets, "malla");

Nav::container("Main Navbar");
Nav::container("Nav area 0");

## FROM ARRAY
Nav::save([
    "tag"           => "user-profiler",
    "route"         => "users/profiler/*",
    "groups"        => ["nav-area-0"],
    "description"   => "Menu de usuarios",
    "template"      => "bootstrap",
    "filters"       => [],
    "items"         => []
]);

// Nav::tag("users-priflers", [
//     "description"   => "Menu de usuarios",
//     "template"      => "bootstrap",
//     "filters"       => [
//     ],
//     "items" => [
//     ]
// ]);

Nav::save( \Malla\Http\Menu\Admin\UserNav::class );

//Nav::route("users/profiler/*", function( $nav ) {
    //$nav->add("route", "users/profler/*");
    //$nav->add("template", "bootstrap");

//     $nav->styleFilter([
//         "{n1}"          => "navbar-nav bg-white my-3 flex-column rounded-1 px-3",
//         "{n2}"          => "dropdown-menu",
//         "{item}"        => "nav-item",
//         "{dropitem}"    => "nav-item dropdown",
//         "{link}"        => "nav-link",
//         "{droplink}"    => "dropdown-item",
//         "{header}"      => "px-2",
//     ]);

//     $nav->addItem(0, function($item){
//         $item->header("user.profiler");
//     });

//     $nav->addItem(1, function($item) {
//         $item->add("type", "link");
//         $item->add("icon", "mdi-account");
//         $item->add("label", "update.password");
//         $item->add("url", "profiler/{usrID}/update/password");
//     });

// });

// Nav::save("admin-nav", function( $nav ) {
//     ## Crea tu menu
// });

Nav::tag("admin-users-nav", function($nav) 
{
    // $nav->item(33, function($item){
    //     $item->locked();
    //     $item->locked($key=2);
    // });

    $nav->item( 33, function( $item ) 
    {
        $item->update([
            "icon"  => "mdi-warning",
            "label" => "Warning"
        ]);

        $item->update(1, [
            "icon" => "mdi-web"
        ]);
    });
});

//dd(Nav::app());

 //dd(Nav::tag("admin-users-nav", 4));

//dd(Nav::tag("user-profiler", 4));
