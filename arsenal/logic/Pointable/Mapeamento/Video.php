<?php

namespace SiLogic\Pointable\Mapeamento;

use SiLogic\Pointable\Pointable;

class Video extends Pointable
{
    public static $POINTS = 1;
    public static $STEPS = 2;

    public static function description()
    {
        return [
            'Assista videos e ganhe 1 ponto por pergunta respondida!'
        ];
    }

    public static function stepZero()
    {
        // Procura por Video não Potuado
        $video = Video::rand();

        // Assista o VIdeo e Clique em Assisti.
        $video->url;
    }


    public static function stepOne()
    {


    }
    
}