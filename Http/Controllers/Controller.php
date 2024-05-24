<?php
namespace Malla\Http\Controllers;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

/*
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
*/

use Malla\Core\Facade\Malla;
use Malla\Alert\Facade\Alert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController 
{
    use AuthorizesRequests, ValidatesRequests;

    protected $path='malla::app.';

    protected $skin;

    public function boot( $app=null, $data=[] )
    {
        $this->app  = $app;
        $app->user  = request()->user();
       
        if( method_exists( $app, 'share' ) ) {
            $data = array_merge( $data, $app->share() );
        }

        if( method_exists( $app, 'settingTheme' ) ) {
            $data = array_merge( $data, $app->share() );
        }
        
        $this->share( $data );        
    }

    public function share( $data ) {
        
        if( !empty( $data ) && is_array( $data ) ) {
            view()->share( $data );
        }
    }

    public function render( $view=NULL, $data=[], $mergeData=[]) {

        if(view()->exists(($path = $this->path.$view))) {
            return view($path, $data, $mergeData);
        }

        abort(500, 'La vista {$path} no existe');
    }

}