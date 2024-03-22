<?php
namespace Malla\Install\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Env
{
    public function data()
    {
        $data['title']  = __("Ambiente Laravel");
        $data["env"]    = app("files")->get(base_path('.env'));

        return $data;
    }

    public function extra()
    {
        if( !is_bool(env("MALLA_START")) )
        {
            $stub   = app("files")->get(__DIR__."/../env.txt");
            $env    =  app("files")->get(base_path('.env'));

            if(!app("files")->exists(__DIR__."/../envbase"))
            {
                app("files")->put(__DIR__."/../envbase", $env);
            }

            $env = str_replace('APP_URL=http://localhost', $stub, $env);

            app("files")->put(base_path('.env'), $env);
        }

        return redirect("env");
    }

    public function update($request)
    {
        if( !empty( ($env = $request->env)) ) 
        {
            if( $request->has("password") )
            {
                $HASH = \Hash::make($request->password);
                $env = str_replace("MALLA_HASH", "MALLA_HASH=".$HASH, $env);
            }

            app("files")->put(base_path('.env'), $env);
        }

        return back();
    }

    public function publish()
    {
        \Artisan::call("vendor:publish", [
            "--tag" => "malla", "--force" => true
        ]);
        
        return back();
    }
}