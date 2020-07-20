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

use Integrations\Connectors\Connector\Cloudflare\Cloudflare;

class FabioAkita
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

    public static function videos()
    {
        $this->videos = [
            'url' => 'https://www.youtube.com/watch?v=O4CWVQLbi48&list=PLdsnXVqbHDUcrE56CH8sXaPF3TTqoBP2z&index=6',
        ];



        $this->videos = [
           'O que eu devo estudar? Vou conseguir emprego?',
           'url' => 'https://www.youtube.com/watch?v=Ll1uAZ-WRa0&list=PLdsnXVqbHDUcrE56CH8sXaPF3TTqoBP2z&index=7'
        ];
    }
}
