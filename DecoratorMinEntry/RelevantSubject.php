<?php
require_once 'Decorator.php';

class RelevantSubject extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "relevant subjects";
    }
}
