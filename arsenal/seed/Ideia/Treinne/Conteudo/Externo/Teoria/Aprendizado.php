<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace SiSeed\Ideia\Treinne\Extern\Teoria;

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

class Aprendizado
{

    public static function run()
    {
        self::playlistOne();
    }

    public static function playlistOne()
    {
        // Começando aos 40, de Fabio Akita
        Video::firstOrCreate(
            [
            'name' => 'O Mercado de TI para Iniciantes em Programação | Série "Começando aos 40"',
            'url'              => 'https://www.youtube.com/watch?v=O76ZfAIEukE&list=PLdsnXVqbHDUc7htGFobbZoNen3r_wm3ki',
            ]
        );
    }
}
