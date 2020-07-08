<?php

namespace SiSeed\Human\Productions;

class MyProduction
{

    public function __construct()
    {
        
    }

    public function getDashboard()
    {
        return [
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