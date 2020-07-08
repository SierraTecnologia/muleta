<?php

namespace SiSeed\Abstrato\Questions;

class Questions
{

    public function __construct()
    {
        
    }

    public function runQuestionsForUser($userId, $reference = false)
    {
        $questions = $this->getQuestions();
    }

    public function getQuestions()
    {
        $dependences = $this->dependences;
        $questions = [];
        foreach($dependences as $dependence) {
            $dependenceInstance = new $dependence();
            $questions = array_merge($questions, $dependenceInstance->getQuestions());
        }

        return array_merge($questions, $dependenceInstance->getQuestions());
    }
    

    /**
     * Serão/Podem ser reescritas
     */

    public function validate()
    {
        /**
         * Retorna as Classes de Questoes que devem estar validadas antes dessa poder ser executada
         */
        return true;
    }

    public function dependences()
    {
        /**
         * Retorna as Classes de Questoes que devem estar validadas antes dessa poder ser executada
         */
        return [
            
        ];
    }
}