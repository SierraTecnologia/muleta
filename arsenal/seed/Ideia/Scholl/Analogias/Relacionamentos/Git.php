<?php
/**
 * 
 */


namespace SiSeed\Ideia\Scholl\Analogias\Relacionamentos;

class Git
{

    public function analogia()
    {
        return [
            [
                'history' => Escritor::class,
                'necessidade' => new Escrever('livro'),
                'problem' => '',
            ]
        ];
    }


    public function chieldrens()
    {
        return [
            Commit::class,
            Branch::class,
        ];
    }

    public function parents()
    {
        return false;
    }
}
