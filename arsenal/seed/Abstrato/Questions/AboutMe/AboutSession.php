<?php

namespace SiSeed\Abstrato\Questions\About;

use SiSeed\Abstrato\Questions\Questions;

class AboutSession extends Questions
{

    /**
     * Questões que serão Perguntadas Antes 
     */
    public function dependences()
    {
        return [
            LikeThat::class
        ];
    }

    public function init()
    {
        return [
            Question::firstOrCreate(
                [
                'question' => 'O companheiro te passou confiança ?',
                'type' => 'seguranca',
                'options' => 'bool',

                'perpective' => 'relation',
                'perpective_reference' => 'App\Models\Event',

                'requeriments' => [

                ],

                'obs' => 'Perguntar no inicia dos Relacionamentos'
                ]
            ),

            Question::firstOrCreate(
                [
                'question' => 'Suas espectativas foram atingidas ? Descreva como foi a Sessão:',
                'type' => 'espectativa',
                'options' => 'text'
                ]
            ),
        ];
    }

    
}