<?php

namespace SiSeed\Human\Productions;

/**
 * Representa uma ação dentro da Produção
 */
class Action
{

    public function attributes()
    {
        return [
            Attributes\Time::class(),
            Attributes\Target::class(),
        ];
    }

    public static function types()
    {
        return [
            'move',
            'talk',
            'make'
        ];
    }

    public function getInsigners()
    {
        
    }

    
}