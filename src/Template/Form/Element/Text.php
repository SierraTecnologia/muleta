<?php

namespace Muleta\Template\Form\Element;

use Muleta\Template\Form\Input;
use PHPCensor\View;

class Text extends Input
{
    /**
     * @param View $view
     */
    protected function onPreRender(View &$view)
    {
        parent::onPreRender($view);

        $view->type = 'text';
    }
}
