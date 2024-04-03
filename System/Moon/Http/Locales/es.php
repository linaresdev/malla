<?php
namespace Malla\Moon\Http\Locale;

return (new class
{
    protected $lines = [];

    public function header() {
        return [
           "slug"         => "es",
           "name"         => "es_DO",
           "description"  => "Español República Dominicana",
        ];
    }

    public function getGrammaries() 
    {
        return [
            "account.getmembership" => "Solicitar mi cuenta",
            "words.auth"    => "Autenticación",
            "words.request" => 'Solicitar',
        ];
    }
});