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

use Telefonica\Models\Actors\Business;
use Telefonica\Models\Actors\Business\Collaborator;

use Integrations\Models\Token;
use Integrations\Models\TokenAccess;

use Integrations\Connectors\Cloudflare\Cloudflare;

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
