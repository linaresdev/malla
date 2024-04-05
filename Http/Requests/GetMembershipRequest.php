<?php
namespace Malla\Http\Requests;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class GetMembershipRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "firstname" => "required",
            "lastname"  => "required",
            "email"     => "required|email|unique:users,email"
        ];
    }
    public function attributes()
    {
        return [
            "firstname" => __("words.firstname"),
            "lastname"  => __("words.lastname")
        ];
    }
    public function messages() {
        return [];
    }

}