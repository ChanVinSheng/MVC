<?php
require_once 'Decorator.php';

class OLevel extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "O Level ";
    }
}
