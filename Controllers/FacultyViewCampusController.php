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
            if (isset($_POST["edit"])) {
                $campusid = $_POST["edit"];
                $row = $this->model->retrievedByID($campusid);
                $this->view->row = $row;
                $this->view->render('FacultyModifyCampusView');
            } elseif (isset($_POST["activate"])) {
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

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $campusid = $_POST["done"];
                $campusname = $_POST["campusname"];
                $column = "campusname";
                $this->model->updateOne($campusid, $campusname, $column);
                echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewCampusController\";</script>";
            }
            elseif (isset($_POST["cancel"])) {
                echo "<script>window.location.href=\"http://localhost/MVC/FacultyViewCampusController\";</script>";
            } 
            else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewCampusController\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewCampusController\";</script>";
        }
    }

}
