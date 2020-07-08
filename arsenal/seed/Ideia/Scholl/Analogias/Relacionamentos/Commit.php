<?php
/**
 * 
 */


namespace SiSeed\Ideia\Scholl\Analogias\Relacionamentos;

class Commit
{

    public $roteiro = false;
    
    /**
     * Pra que serve
     *
     * @return void
     */
    public function __construct($roteiro)
    {
        $this->roteiro = $roteiro;

        $this->addContext();

        $this->roteiro->relatedWith(Scene::class);
        
    }

    public function aulas()
    {
        return [
            [
                'history' => Escritor::class,
                'necessidade' => new Escrever('livro'),
                'problem' => '',
            ]
        ];
    }

    public function analogias()
    {
        return [
            [
                'history' => Escritor::class,
                'necessidade' => new Escrever('livro'),
                'problem' => '',
            ]
        ];
    }


    public function generate()
    {
        return [
            'commit' => [
                'Uma cena acontendo na History',
            ],
            'branch' => [
                
            ],
        ];
    }


    public function chieldrens()
    {
        return [
            CommitMessage::class,
        ];
    }

    public function parents()
    {
        return false;
    }
}
