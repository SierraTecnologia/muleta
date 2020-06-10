<?php

namespace Muleta\Template\Form\Validator;

interface ValidatorInterface
{
    public function __invoke($value);
}
