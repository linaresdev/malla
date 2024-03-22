<?php
namespace Malla\Core\Support;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Store
{
    protected $apps;

    public function __construct($DB)
    {
        $this->apps = $DB->table("apps");
    }

    public function has($table)
    {
        return \Schema::hasTable($table);
    }

    public function empty($table)
    {
        return ( $this->apps->count() > 1 );
    }

    public function type($type)
    {
        return $this->apps->where("type", $type);
    }

    public function getApp($type, $slug)
    {
        return $this->type($type)->where("slug", $slug)->first();
    }
    
    public function core(){}
    public function library(){}
    public function package(){}
    public function theme(){}
}