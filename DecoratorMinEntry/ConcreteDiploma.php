<?php

require_once 'IMinEntry.php';

class ConcreteDiploma implements IMinEntry{

    public function getContent(): string {
        return "Diploma - ";
    }

}
