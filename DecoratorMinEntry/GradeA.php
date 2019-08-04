<?php
require_once 'Decorator.php';

class GradeA extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "Grade A ";
    }
}
