<?php
require_once 'Decorator.php';

class English extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "English";
    }
}
