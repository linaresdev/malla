<?php
namespace Malla\Menu\Middleware;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Closure;
use Illuminate\Support\Facades\Auth;

class MenuMiddleware {

    protected $exerts = [];

    public function handle( $request, Closure $next, $guard = 'web')
    {
        $AUTH = Auth::guard($guard);
        $USER = $request->user();

        require_once(__path('{http}/Menu/Handle.php'));

        return $next( $request );
    }

}