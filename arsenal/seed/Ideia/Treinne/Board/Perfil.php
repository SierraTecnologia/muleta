<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace SiSeed\Ideia\Treinne\Cap1Basico;

use App\Models\User;
use App\Models\Role;
use App\Models\Gateway;
use App\Models\TrackingType;
use Illuminate\Support\Facades\DB;

use Finder\Models\Digital\Code\Project;

use Population\Models\Identity\Actors\Business;
use Population\Models\Identity\Actors\Business\Collaborator;

use Population\Models\Components\Integrations\Token;
use Population\Models\Components\Integrations\TokenAccess;

use Finder\Spider\Integrations\Cloudflare\Cloudflare;

class Perfil
{
    public $skills = false;

    public static function run()
    {
        self::skills();
    }

    public static function skills()
    {
        $this->skills = [
            [
                'name' => 'Gerais'
            ],
            [
                'name' => 'Marketing'
            ],
            [
                'name' => 'Programação'
            ]
        ];
    }
}
