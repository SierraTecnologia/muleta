<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace SiSeed\Ideia\Treinne\Conteudo\_Geral\Cap1Basico;

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

class Git_VersionandoECompartilhandoTextos
{
    public $sitec = false;


    public static function run()
    {
        self::about();
    }

    /**
     * POrque é importante
     */
    public static function about()
    {
        $this->text(
            [
            'name' => 'O que faz alguem ser foda, não é ter sorte.'.
                'E sim, a arte de se colocar no lugar de qualquer outra pessoa, e descobrir alguma forma de tirar beneficio disso !',
            ]
        );
    }

    /**
     * Como avançar com isso
     */
    public static function howDoIt()
    {
        $this->text();
    }
}
