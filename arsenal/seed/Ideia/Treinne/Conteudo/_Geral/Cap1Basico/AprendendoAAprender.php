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

use Telefonica\Models\Actors\Business;
use Telefonica\Models\Actors\Business\Collaborator;

use Integrations\Models\Token;
use Integrations\Models\TokenAccess;

use Integrations\Connectors\Connector\Cloudflare\Cloudflare;

class AprendendoAAprender
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
            'Nao se limite a uma profissão, uma ferramenta, um conhecimento.',
        );
        $this->text(
            'Aprenda sobre tudo! Só existem 2 tipos de progrmaadores, aquele que recebe 2 mil por mes e aqueles que recebem 10.
            Qual a diferença entre eles ? Um aprendeu a fazer algo em TI. O outro, sabe como aprender qlqr coisa.',
        );
        $this->text(
            'Extraia conhecimento de tudo ao seu redor e de todos! Cada pessoa tem conhecimentos unicos que aprendeu durante a vida que voce pode aprender.
            Até com um mendigo podemos ter certeza que tem algo que ele saiba melhor que a gente.',
        );
        $this->text(
            'Aprenda sobre tudo! Em nenhuma parte da historia o mundo ficou mais de 100 anos sem mudar completamente. Seu emprego nao é eterno, seu trabalho nao é, nunca será. Seje bom em se adaptar a qualquer ambiente sendo o mais perofrmatico possivel.',
        );
    }

    public static function rules()
    {
        $this->text(
            'Nunca se fecha para novos conhecimentos.'
        );
        $this->text(
            'Entenda a internet como uma extensão do seu cerebro. Nunca fale que nao sabe oq é algo antes de pesquisar.'
        );
        $this->text(
            'Encontre sempre as perguntas corretas. Oq move o mundo são sempre as perguntas, nunca as respostas! Aprenda a questionar tudo e todos ! Afinal, todo mundo esta errado em algo. Oq te torna melhor é enxergar mais rapidamente esses erros para melhorar a cada dia!'
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
