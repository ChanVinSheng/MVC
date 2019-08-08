<?php
/*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/

class Help extends Controller {

    function __construct() {
         parent::__construct();     
    }
    
    function index(){
        $this->view->render('help/index');
    }
    
    public function other($arg = false){
        
         echo 'other';
    }

}

