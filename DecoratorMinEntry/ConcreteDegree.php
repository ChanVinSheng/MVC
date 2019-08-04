<?php

require_once 'IMinEntry.php';

class ConcreteDegree implements IMinEntry{

    public function getContent(): string {
        return "Degree - ";
    }

}
