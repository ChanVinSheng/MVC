<?php
/*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/

class ProfileController {

    private $model;

    function __construct() {
        $this->model = new StaffModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denie.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        
        $xml = new XmlGenerate("user");
        $xml->databaseToXml("user", "user.xml");
        $sax = new userSAXParser("user");
        $userdata = $sax->getData();

        $this->view->render('UserProfile');
    }

}
