<?php

require_once 'IMinEntry.php';

class ConcreteALEVEL implements IMinEntry{

    public function getContent(): string {
        return "A LEVEL ";
    }

}
