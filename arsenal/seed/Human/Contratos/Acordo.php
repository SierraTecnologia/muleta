<?php

namespace SiSeed\Human\Contratos;

class Acordo
{

    public static function getDataClasses()
    {
        return [
            Cenas::class,
            FullPersonagem::class,
        ];
    }

    /**
     * Contratos
     */

    public function description($text)
    {

    }

    // Duração de Contrato
    public function juramento($text)
    {

    }

    // Sobre os Bens
    public function concordo($text)
    {

    }

    // Direitos de Imagens
    public function obrigacoes($text)
    {

    }

    // Direitos de Imagens
    public function consequencias($text)
    {

    }

    public function propriedade($text)
    {

    }
    


    /**
     * Executar
     *
     * @param  [type] $bottom
     * @param  [type] $dom
     * @return void
     */
    public function executeContract($bottom, $dom)
    {
        // Começo
        $this->text(
            'Eu, {BottomName}, ciente das regras que regem o BDSM, declaro por livre e '.
            'espontânea vontade, e por ser expressão da verdade, que a partir de hoje, me torno Escrava e Mulher de {TopName}.',
            [
                '{BottomName}' => '',
                '{TopName}' => '',
            ]
        );




        // Final
        $this->text(
            'Declaro que tive tempo suficiente para refletir e ter ciência das conseqüências das determinações acima.
            
            O seguinte contrato é verdadeiro e dou fé.
            Em São Paulo, Aos XX Dias do mês de XXXXXX do Sétimo Ano do Terceiro Milênio.
            
            ________________________ _______________________
            
            <Nome do Dom> – Mestre <Nome da Escrava> – Escrava'
        );
    }
    
}