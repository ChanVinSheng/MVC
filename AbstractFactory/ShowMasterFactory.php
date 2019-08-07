<?php

require_once 'AbstractFactory/AbstractFactory.php';
require_once 'AbstractFactory/ShowMaster.php';

class ShowMasterFactory extends AbstractFactory {

    public function getShow() {
        return new ShowMaster();
    }

}
