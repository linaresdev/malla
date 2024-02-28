<?php
namespace Projet\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class App extends Model {

    use HasFactory;

    protected $table = 'apps';

    protected $fillable = [
        "id",
        "type",
        "parent",
        "slug",
        "driver",
        "serial",
        "activated",
        "created_at",
        "updated_at"
    ];

    public function meta()
    {
        return $this->morphMany();
    }
}