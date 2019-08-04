<?php
require_once 'Decorator.php';

class in extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "in ";
    }
}

