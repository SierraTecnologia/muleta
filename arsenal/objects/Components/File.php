<?php

namespace SiObjects\Components\Components;

/**
 * User Helper - Provides access to logged in user information in views.
 *
 * @author Ricardo Sierra <ricardo@sierratecnologia.com>
 */
class File
{

    protected $target = false;

    public function __construct($target)
    {
        $this->target = $target;
    }
    
    
    public function getTarget()
    {
        return $this->target;
    }
}
?>