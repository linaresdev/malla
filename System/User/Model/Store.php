<?php
namespace Malla\User\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Store extends User
{
    protected $table = 'users';

    protected $fillable = [
        "id",
        "type",
        "name",
        "fullanme",
        "firstname",
        "lastname",
        "rnc",
        "user",
        "cellphone",
        "email",
        "email_verified_at",
        "password",
        "gender",
        "activated",
        "remember_token",
        "created_at",
        "updated_at"
    ];

    public function counters() {
        return $this->morphMany(\Malla\Model\Counter::class, "contable");
    }

    public function configs() {
        return $this->morphMany(\Malla\Model\Config::class, "configable");
    }

    public function meta() {
        return $this->morphMany(\Malla\Model\Meta::class, "metable");
    }

    public function profiles() {
        return $this->hasOne(Profiles::class);
    }

    public function avatar() {
        return $this->morphOne(\Malla\Model\Avatar::class, "avatable");
    }

    ## Many to Many
    public function groups() {
        return $this->morphToMany(\Malla\Model\Group::class, "groupable");
    }

    ## HELPERS
    public function fullname() {
        return $this->firstname.' '.$this->lastname;
    }
}