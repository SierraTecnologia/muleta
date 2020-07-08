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

use Finder\Models\Digital\Code\Project;

use Population\Models\Identity\Actors\Business;
use Population\Models\Identity\Actors\Business\Collaborator;

use Population\Models\Components\Integrations\Token;
use Population\Models\Components\Integrations\TokenAccess;

use Finder\Spider\Integrations\Cloudflare\Cloudflare;

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
