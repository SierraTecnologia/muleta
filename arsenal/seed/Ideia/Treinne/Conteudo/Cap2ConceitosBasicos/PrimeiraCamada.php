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

use Finder\Models\Digital\Code\Project;

use Population\Models\Identity\Actors\Business;
use Population\Models\Identity\Actors\Business\Collaborator;

use Population\Models\Components\Integrations\Token;
use Population\Models\Components\Integrations\TokenAccess;

use Finder\Spider\Integrations\Cloudflare\Cloudflare;

class PrimeiraCamada
{
    public $sitec = false;

    public static function run()
    {
        $this->text('Programação nada mais é doq montar quebra cabeças.');
        $this->text('Saiba doq precisa, pegue os componentes certos e monte seu quebra cabeça');
        self::isolamento();
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function isolamento()
    {
        $this->text('Primeira camada. Operações e entradas e Saidas');

        $this->text('Tipos de Entradas e Saidas:');
        $this->options(
            [
            'texto' => 'string',
            'inteiro' => 'int',
            'decimal' => 'float',
            'verdadeiroOuFalso' => 'bolleano'
            ]
        );

        $this->text('Operações:');
        $this->options(
            [
            'atribuição' => '=',
            'soma' => '=',
            'subtração' => '=',
            'soma' => '='
            ]
        );

        $this->text('Condições e Loopings:');
        $this->code(
            function () {
                $idade = 3;
                if ($idade > 18) {
                    return 'Maior que 18';
                }

                return 'Menor que 18';
            }
        );
    }
    

}