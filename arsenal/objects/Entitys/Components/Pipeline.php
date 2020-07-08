<?php

namespace SiObjects\Entitys\Components;

use Finder\Routines\Contracts\Registrator;
use Finder\Routines\Contracts\Notificator;

/**
 * Class Pipeline
 *
 * @package SiObjects\Entitys\Components
 */
class Pipeline
{
    
    public function __toString()
    {
        return (string) 'To String Pipeline';
    }

    /**
     * @var null|string
     */
    protected $result = null;
    /**
     * @return null
     */
    public function getResult()
    {
        return $this->result;
    }
    /**
     * @param  string $result
     * @return static
     */
    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }
    /**
     * @param  $result
     * @return $this
     */
    public function addResult($result)
    {
        $this->result .= $result;
        return $this;
    }
}