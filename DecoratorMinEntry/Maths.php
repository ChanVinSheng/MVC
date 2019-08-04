<?php
require_once 'Decorator.php';

class Maths extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "Mathematics";
    }
}
