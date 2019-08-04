<?php
require_once 'Decorator.php';

class SPM extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "SPM ";
    }
}

