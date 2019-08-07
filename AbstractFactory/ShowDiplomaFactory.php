<?php

require_once 'AbstractFactory/AbstractFactory.php';
require_once 'AbstractFactory/ShowDiploma.php';

class ShowDiplomaFactory extends AbstractFactory {

    public function getShow() {
        return new ShowDiploma();
    }

}
