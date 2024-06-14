<?php
namespace Malla\User\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Malla\Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

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

    protected static function newFactory() {
        return UserFactory::new();
    }

    public function counters() {
        return $this->morphMany(\Malla\Model\Counter::class, "contable");
    }
    /** CONFIG **/
    public function configs() {
        return $this->morphMany(\Malla\Model\Config::class, "configable");
    }

    public function hasConfig($key) {
        return ($this->configs()->where("key", $key)->count() > 0);
    }

    public function saveOrUpdateConfig($key, $value) 
    {
        $config = $this->configs();

        if( ($updateConfig = $config->where("key", $key))->count() > 0 ) {
            return $updateConfig->update(["value" => $value]);
        }
        else {
            return $config->create(["key" => $key, "value" => $value]);
        }

        return false;
    }

    public function getConfigs() {
        return $this->configs()->where("activated", 1)
            ->select("key", "value")->get();
    }

    public function getConfig($key, $default=null )
    {
        $config = $this->configs()->where("key", $key)->first() ?? false;

        if( $config ) {
            return $config->value;
        }

        return $default;
    }
    /** END CONFIG **/

    public function meta() {
        return $this->morphMany(\Malla\Model\Meta::class, "metable");
    }

    public function profiles() {
        return $this->hasOne(Profiles::class);
    }

    public function avatar() {
        return $this->morphOne(\Malla\Model\Avatar::class, "avatable");
    }

    public function getAvatar()
    {
        if( $this->avatar != null) {
            return $this->avatar->url;
        }

        return "{cdn}/images/avatar/user.png";
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