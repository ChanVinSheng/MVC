<?php

require 'Models/FacultyCampusModel.php';

class FacultyViewCampusController extends Controller {

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
        $row = $this->model->retrieveAllCampus();
        $this->view->row = $row;
        $this->view->render('FacultyViewCampusView');
    }

    function modify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["activate"])) {
                $campusid = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->model->updateOne($campusid, $status, $column);
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/FacultyViewCampusController\";</script>";    
            } elseif (isset($_POST["deactivate"])) {
                $campusid = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->model->updateOne($campusid, $status, $column);
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/FacultyViewCampusController\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewCampusController\";</script>";
            }
        }
    }

}
