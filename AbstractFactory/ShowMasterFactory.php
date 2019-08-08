<?php
/*Author: Leek Hon Lun (18WMR08344) RSD3G2*/
require_once 'AbstractFactory/AbstractFactory.php';
require_once 'AbstractFactory/ShowMaster.php';

class ShowMasterFactory extends AbstractFactory {

    public function getShow() {
        return new ShowMaster();
    }

}
