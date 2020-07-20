<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace SiSeed\Ideia\Treinne\Aprendizado\Filosofias;

use App\Models\User;
use App\Models\Role;
use App\Models\Gateway;
use App\Models\TrackingType;
use Illuminate\Support\Facades\DB;

use Fabrica\Models\Code\Project;

use Population\Models\Identity\Actors\Business;
use Population\Models\Identity\Actors\Business\Collaborator;

use Integrations\Models\Token;
use Integrations\Models\TokenAccess;

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
