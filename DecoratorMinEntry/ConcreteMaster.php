<?php

require_once 'IMinEntry.php';

class ConcreteMaster implements IMinEntry{

    public function getContent(): string {
        return "Master - ";
    }

}
