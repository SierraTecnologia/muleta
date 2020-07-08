<?php
/**
 * 
 */

namespace SiSeed\Ideia\Scholl;

use Log;

class Board
{

    protected function dashboard()
    {
        // Tarefas


        // Profile
    }

    protected function action()
    {
        return [
            Estudar::class
        ];
    }

    /**
     * 
     */
    public function getBoards()
    {
        return [
            InfraBoard::class
        ];
    }

}
