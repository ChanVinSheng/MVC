<?php
/*Author: Leek Hon Lun (18WMR08344) RSD3G2*/
require_once 'AbstractFactory/Show.php';

class ShowMaster implements Show {

    public function getName() {
        $show = 4;
        return $show;
    }

}
