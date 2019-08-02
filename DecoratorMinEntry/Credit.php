<?php
require_once 'Decorator.php';

class Credit extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). " Credit of ";
    }
}
