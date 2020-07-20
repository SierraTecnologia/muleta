<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace SiSeed\Ideia\Treinne\Provas\Aprendizado\DandoComandos;

use App\Models\User;
use App\Models\Role;
use App\Models\Gateway;
use App\Models\TrackingType;
use Illuminate\Support\Facades\DB;

use Fabrica\Models\Code\Project;

use Population\Models\Identity\Actors\Business;
use Population\Models\Identity\Actors\Business\Collaborator;

use Population\Models\Components\Integrations\Token;
use Population\Models\Components\Integrations\TokenAccess;

use Integrations\Connectors\Connector\Cloudflare\Cloudflare;

class ExercicioReceitaParaORatoSairDoLabirinto
{
    public $sitec = false;

    public static function run()
    {
        self::about();
    }

    public static function about()
    {
        $text = '';
    }
}
