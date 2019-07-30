<?php

require 'Models/FacultyCurriculumModel.php';

class FacultyViewCurriculumController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyCurriculumModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $row = $this->model->retrieveAllCurriculum();
        $this->view->row = $row;
        $this->view->render('FacultyViewCurriculumView');
    }

    function modify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                $curriculumid = $_POST["edit"];
                $row = $this->model->retrievedByID($curriculumid);
                $this->view->row = $row;
                $this->view->render('FacultyModifyCurriculumView');
            } elseif (isset($_POST["activate"])) {
                $curriculumid = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->model->updateOne($curriculumid, $status, $column);
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/FacultyViewCurriculumController\";</script>";    
            } elseif (isset($_POST["deactivate"])) {
                $curriculumid = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->model->updateOne($curriculumid, $status, $column);
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/FacultyViewCurriculumController\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewCurriculumController\";</script>";
            }
        }
    }

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $curriculumid = $_POST["done"];
                $curriculumname = $_POST["curriculumname"];
                $curriculumdesc = $_POST["curriculumdesc"];
                $this->model->updateAll($curriculumid, $curriculumname, $curriculumdesc);
                echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewCurriculumController\";</script>";
            }
            elseif (isset($_POST["cancel"])) {
                echo "<script>window.location.href=\"http://localhost/MVC/FacultyViewCurriculumController\";</script>";
            } 
            else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewCurriculumController\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewCurriculumController\";</script>";
        }
    }

}