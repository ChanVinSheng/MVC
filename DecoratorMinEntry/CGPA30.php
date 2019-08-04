<?php
require_once 'Decorator.php';

class CGPA30 extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "CGPA 3.0 ";
    }
}
