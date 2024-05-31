<?php
/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

## Registro de menu 
Nav::save( new \Malla\Http\Menu\MainNavbar( $auth, $request ));
Nav::save( new \Malla\Http\Menu\MainNav( $auth, $request ));

//Nav::save( new \Malla\Http\Menu\OfficeNavbar( $auth, $request ));

//dd( Nav::tag("main-nav") );

