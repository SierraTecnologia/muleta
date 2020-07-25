<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace SiSeed\Ideia\Treinne\Conteudo\_Geral;

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

class ComoSerFoda
{
    public $sitec = false;

    public static function run()
    {
        $this->mandamento(
            'Foque no certo. Isole todo seu ambiente. ',
            self::isolamento()
        );

        $this->mandamento(
            'As palavras dependem do contexto',
            self::semantica()
        );

        $this->mandamento(
            'Tudo que for complexo, devem ser separado em partes menores, isoladas, em camadas. De fora pra dentro.',
            self::engenhariaReserva()
        );
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function isolamento()
    {
        $this->text('Sempre isole tudo, trabalhe sempre com camadas !');
        $this->text('Minha filha Manu calculando sózinha em PYthon sem saber escrever !');

        $this->history('');

        $this->text('Parte 1: Cenário!');
        $this->text('Sempre isole tudo!');
        $this->text('Sempre isole tudo!');
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function engenhariaReserva()
    {
        $this->text('Não se assuste com algo desconhecido');
        $this->text('Investigue de fora pra dentro');
        $this->text('Isole em camadas ou partes. Chamaremos de Cenários!');
        $this->text('Se preocupe apenas com oq entra e oq sai de dentro do cenário');
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function semantica()
    {
        $this->text('Não se assuste com algo desconhecido');
        $this->text('Investigue de fora pra dentro');
        $this->text('Isole em camadas ou partes. Chamaremos de Cenários!');
        $this->text('Se preocupe apenas com oq entra e oq sai de dentro do cenário');
    }

    /**
     * 
     */
    public static function questioneTudo()
    {
        $this->text('Não existe Semi DEuses');
        $this->reference('https://www.youtube.com/watch?v=ootebOORRBc');
    }

}