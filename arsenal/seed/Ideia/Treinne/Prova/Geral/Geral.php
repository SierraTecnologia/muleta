<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace SiSeed\Ideia\Treinne\Provas\Geral;

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

use Integrations\Connectors\Connector\Cloudflare\Cloudflare;

class Geral
{
    public $sitec = false;

    public static function run()
    {
        self::provas();
    }

    public static function provas()
    {
        // Testa oq o aluno sabe sobre git
        Prova::firstOrCreate(
            [
            'name'              => 'Git',
            ]
        );
    }
}
