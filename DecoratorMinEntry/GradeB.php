<?php
require_once 'Decorator.php';

class GradeB extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "Grade B ";
    }
}
