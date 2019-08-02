<?php
require_once 'Decorator.php';

class Malay extends Decorator
{
    public function getContent(): string
    {
        return parent::getContent(). " Malay";
    }
}
