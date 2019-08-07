<?php

require_once 'AbstractFactory/AbstractFactory.php';
require_once 'AbstractFactory/ShowDegree.php';

class ShowDegreeFactory extends AbstractFactory {

    public function getShow() {
        return new ShowDegree();
    }

}
