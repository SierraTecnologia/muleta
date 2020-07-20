<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace SiSeed\Ideia\Treinne\Conteudo\ModeloInterprise;

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

use Integrations\Connectors\Connector\Cloudflare\Cloudflare;

class Init
{
    public $sitec = false;

    public static function run()
    {
        self::about();
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function about()
    {
        $oqEh = [
            'Modelo Antigo e Padronizado de fazer Negocio',
            'Cabeça Conservadora Antiga'
        ];

        $this->text('Eles são ultrapassados, a tecnologia superou eles. É muito facil voce crescer dentro de uma empresa business.');

        $this->text('Oq faz voce especial é ser difernte de todo o resto!');

        $this->text('Deixe sempre claro seus objetivos');
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function planeje()
    {
        $this->text('Planeje cada passo que será dado! Tenha metas anuais, quebre em mensais, quebre em diarias. Tente sempre achar erro em tudo. E anote e elabore muto bem. ');

        $this->text('Como voce se ve daqui a 3 anos ?');
    }
        
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function seColoqueNoLugarDeCadaActorEmCadaCenario()
    {
        
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function horaDoAtaque()
    {
        $this->text('Pergunte diretamente ao seu gestor: Oq eu preciso aprender para ser promovido ?');
        $this->text('Pergunte diretamente ao seu gestor: Oq eu preciso aprender para aumentar meu salário ?');


    }

}