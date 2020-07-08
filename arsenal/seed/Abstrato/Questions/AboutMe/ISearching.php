<?php

namespace SiSeed\Abstrato\Questions\About;

use SiSeed\Abstrato\Questions\Questions;

class ISearching extends Questions
{

    /**
     * Questões que serão Perguntadas Antes 
     */
    public function validate()
    {
        return [
            LikeThat::class
        ];
    }

    public function init()
    {
        $questions[] = Question::firstOrCreate(
            [
            'question' => 'Quais Praticas sonhas toda hora ?',
            'options' => 'options::model-Taste'
            ]
        );

        $questions[] = Question::firstOrCreate(
            [
            'question' => 'A quantos anos prática bdsm ?',
            'options' => 'integer'
            ]
        );

        $questions[] = Question::firstOrCreate(
            [
            'question' => 'Descreva sua melhor experiência com BDSM',
            'options' => 'text'
            ]
        );

        return $questions;
    }

    
}