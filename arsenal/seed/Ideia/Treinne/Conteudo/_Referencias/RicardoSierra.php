<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace SiSeed\Ideia\Treinne\Conteudo\_Referencias;

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

class RicardoSierra
{
    public $skill = false;

    public static function run()
    {
        self::skill();
    }

    public static function skill()
    {
        $this->skill = [
            'prog' => 10,
            'empreendedorismo' => 10,
            'marketing' => 10,
        ];
    }
}
