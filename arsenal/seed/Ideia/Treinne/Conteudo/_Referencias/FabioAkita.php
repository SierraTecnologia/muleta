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

use Fabrica\Models\Code\Project;

use Telefonica\Models\Actors\Business;
use Telefonica\Models\Actors\Business\Collaborator;

use Integrations\Models\Token;
use Integrations\Models\TokenAccess;

use Integrations\Connectors\Cloudflare\Cloudflare;

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
