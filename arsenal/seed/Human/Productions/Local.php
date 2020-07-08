<?php

namespace SiSeed\Human\Productions;

class Local
{

    public function __construct()
    {
        
    }

    public function attributes()
    {
        return [
            Production::class(),
            Attributes\Target::class(),
        ];
    }

    public static function components()
    {
        return [
            Scene::class,

        ];
    }

    
}