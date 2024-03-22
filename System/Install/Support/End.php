<?php
namespace Malla\Install\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Model\App;
use Malla\Core\Facade\Malla;

class End 
{
    public function application() 
    {
        $app = (new App)->where("type", "core")
                        ->where("slug", "core");

        if( $app->count() > 0 )
        {
            $app = $app->first();

            $app->activated = 1;

            if( $app->save() )
            {
                $this->toggleMalla();

                return redirect('/');
            }
        }

        return back();
    }

    public function toggleMalla()
    {
        $env = str_replace (
            "MALLA_START=false", 
            "MALLA_START=true", 
            app("files")->get(base_path('.env'))
        );

        app("files")->put(base_path('.env'), $env);
    }
}