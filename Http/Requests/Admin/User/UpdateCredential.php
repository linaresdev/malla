<?php
namespace Malla\Http\Requests\Admin\User;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class UpdateCredential extends FormRequest {   

    public function authorize() {
        return true;
    }

    public function rules() {

        // if( $this->request->get("form") == "account" ) 
        // {
            return [
                "email"     => "required",
                "cellphone" => "required"
            ];
        // }
    }

    public function attributes() {      
    }

    public function messages() {
        return [];
    }

}