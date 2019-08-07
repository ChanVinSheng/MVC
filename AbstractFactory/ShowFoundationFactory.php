<?php

require_once 'AbstractFactory/AbstractFactory.php';
require_once 'AbstractFactory/ShowFoundation.php';

class ShowFoundationFactory extends AbstractFactory {

    public function getShow() {
        return new ShowFoundation();
    }

}
