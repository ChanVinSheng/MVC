<?php
/*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/

class Errorpage extends Controller {
    
    function __construct() {
        parent::__construct();             
    }
    
        function index(){
            
        $this->view->render('error/index' , true);
    }
}
