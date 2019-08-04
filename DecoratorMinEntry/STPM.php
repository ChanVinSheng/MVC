<?php
require_once 'Decorator.php';

class STPM extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "STPM ";
    }
}

