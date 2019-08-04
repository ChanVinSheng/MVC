<?php

require_once 'IMinEntry.php';

class ConcreteFoundation implements IMinEntry{

    public function getContent(): string {
        return "Foundation - ";
    }

}
