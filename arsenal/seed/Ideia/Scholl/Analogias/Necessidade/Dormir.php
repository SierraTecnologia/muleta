<?php
/**
 * 
 */


namespace SiSeed\Ideia\Scholl\Analogias\Necessidade;

class Dormir
{

    public function __construct(Reinado $reinado )
    {
        $this->setContext(
            [
            ''
            ]
        );
    }
    
    public function getProblema()
    {
        $history = $reinado;
        $history->addNecessidade();
    }


    public function targets()
    {
        $inocente = [
            [
                
            ],
            'actions' => [
                'tapear',
            ]
        ];


        $medio = [
            [
                
            ],
            'actions' => [
                'tapear',
            ]
        ];


        $putaria = [
            [
                
            ],
            'actions' => [
                'tapear',
            ]
        ];
    }

    public function nextScene()
    {

    }
}
