<?php
namespace Malla\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'terms';

    protected $fillable = [
        "id",
        "type",
        "parent",
        "slug",
        "name",
        "activated",
        "created_at",
        "updated_at"
    ];

    public function apps() {
        return $this->morphedByMany(\Malla\Model\App::class, "taxonomies");
    }

    public function configs() {
        return $this->morphedByMany(\Malla\Model\Config::class, "taxonomies");
    }

    public function meta() {
        return $this->morphMany(\Malla\Model\Meta::class, "metable");
    }

    public function users() {
        return $this->morphedByMany(\Malla\User\Model\Store::class, "taxonomies");
    }
}