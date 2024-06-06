<?php
namespace Malla\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model {

    use HasFactory;

    protected $table = 'metas';

    protected $fillable = [
        "id",
        "type",
        "key",
        "value",
    ];

    public $timestamps = false;

    public function apps() {
        return $this->belongsTo(\Malla\Model\App::class);
    }
    
    public function metable() {
        return $this->morphTo();
    }

    public function add($data) {
        foreach($data as $key => $value ) {
            $this->create(["key" => $key, "value" => $value]);
        }
    }
}