<?php
namespace Malla\Http\Middlewares;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Closure;
use Illuminate\Support\Facades\Auth;

class MallaMiddleware {

    protected $exerts = [
        "/",
        "login",
        "logout",
        "getmembership",
    ];

    public function handle( $request, Closure $next, $guard = 'web' )
    {
        $auth = Auth::guard($guard);

        require_once(__DIR__."/../Menu/Handle.php");

        if( $auth->guest($guard) && !in_array($request->path(), $this->exerts) ) {
            return redirect()->to("login");
        } 
        
        if( $auth->check() )
        {
            $data["UI"] = $auth->user();
            
            app("view")->share($data);
        }

        return $next( $request );
    }
}