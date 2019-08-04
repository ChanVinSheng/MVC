<?php
require_once 'Decorator.php';

class GradeTwo extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "2 ";
    }
}
