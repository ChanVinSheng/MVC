<?php

require_once 'Models/XmlGenerate.php';
require_once 'Models/userSAXParser.php';

class AdminHomeController extends Controller {

    function __construct() {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        echo "hello";

        $this->view->render('AdminHomeView');
    }

}
