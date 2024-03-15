<?php
namespace Malla\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';

    protected $fillable = [
        "id",
        "key",
        "value",
        "activated"
    ];

    public $timestamps = false;

    public function apps() {
        return $this->belongsTo(\Malla\Model\App::class,"configable_id", "id");
    }

    public function users() {
        return $this->belongsTo(\Malla\User\Model\Store::class, "configable_id", "id");
    }

    public function configable() {
        return $this->morphTo();
    }

    public function groups() {
        return $this->morphToMany(\Malla\Model\Config::class, "taxonomies");
    }
}