<?php
require_once 'Decorator.php';

class Degree extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "Bachelor's Degree ";
    }
}
