<?php

namespace SiWeapons\Saas;

use Illuminate\Database\Eloquent\Model;
use Log;
use App\Models\User;
use App\Sitec\Filter;

class CorreiosService extends Service
{

    public function __construct()
    {
        $this->url = 'https://viacep.com.br/ws';
        $this->companyToken = false;
    }

    public function validateCep($cep)
    {
        $cep = Filter::cep($cep);
        if (!$cep = $this->get($cep.'/json')) {
            return [
                "erro" => true
            ];
        }
        return $cep;
    }
    
}
