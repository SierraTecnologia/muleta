<?php
/**
 * 
 */

namespace SiSeed\Ideia\Scholl;

use Log;

class Alunos extends Board
{

    protected function dashboard()
    {

    }

    protected function getInteresses()
    {
        return [

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
