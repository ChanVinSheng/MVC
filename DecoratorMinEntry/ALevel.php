<?php
require_once 'Decorator.php';

class ALevel extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "A Level ";
    }
}
