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

    ];

    public function metatable()
    {
        return $this->morphTo();
    }

}