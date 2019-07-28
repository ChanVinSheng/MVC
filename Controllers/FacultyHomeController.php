<?php


class FacultyHomeController extends Controller {

    function __construct() {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        

        $this->view->render('FacultyHomeView');
    }

}
