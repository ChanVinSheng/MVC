<?php
require_once 'Decorator.php';

class Grade extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "Grade in ";
    }
}
