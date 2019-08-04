<?php
require_once 'Decorator.php';

class UEC extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "UEC ";
    }
}

