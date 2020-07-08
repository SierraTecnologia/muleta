<?php

namespace SiSeed\Human\Productions;

class Production
{

    protected $roteiro = false;

    public function __construct(Roteiro $roteiro)
    {
        $this->roteiro = $roteiro;
    }

    public function getDashboard()
    {
        return [
            'numbers' => [

            ],
            'actions' => [
                Actions\Gravar::class,
                Actions\Search::class,
            ],
            'actors'    => $this->actors,
            'scenes'   => $this->scenes,
            'locals'    => $this->locals
        ];
    }

    public static function actors()
    {
        return [
            
        ];
    }

    
}