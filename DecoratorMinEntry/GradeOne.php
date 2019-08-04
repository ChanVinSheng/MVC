<?php
require_once 'Decorator.php';

class GradeOne extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "1 ";
    }
}
