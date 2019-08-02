<?php
require_once 'Decorator.php';

class GradeThree extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). " 3";
    }
}
