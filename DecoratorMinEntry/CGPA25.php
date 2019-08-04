<?php
require_once 'Decorator.php';

class CGPA25 extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "CGPA 2.5 ";
    }
}
