<?php

require 'Models/FacultyCampusModel.php';

class FacultyAddCampusController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyCampusModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $campusname = $_POST["campusname"];

            $this->model->insert($campusname);
            echo "<script>alert(\"Successfully Added\"); window.location.href=\"FacultyAddCampusController\";</script>";
        }
        $this->view->render('FacultyAddCampusView');
    }

}
