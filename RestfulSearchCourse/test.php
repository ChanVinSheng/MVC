<?php
/*Author: Leek Hon Lun (18WMR08344) RSD3G2*/
require_once "api.php";

class test extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('client');
    }

    function run() {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];

            $mobileRestHandler = new api();
            $response = $mobileRestHandler->getMobile($name);
            $result = json_decode($response);
             $this->view->found = $result;  
            header("Content-Type:text/html");


            //    $this->view->found = $result->data;
            $this->view->render('client');
        }
    }

}
