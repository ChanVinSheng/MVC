<?php

require 'Models/FacultyCourseModel.php';

require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationCourseName.php';
require_once 'StrategyValidation/ValidationCourseInfo.php';

class FacultyViewCourseController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyCourseModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $row = $this->model->retrieveAllCourse();
        $this->view->row = $row;
        $this->view->render('FacultyViewCourseView');
    }

    function modify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                $courseid = $_POST["edit"];
                $_SESSION['courseid'] = $courseid;
                $row = $this->model->retrievedByID($courseid);
                $this->view->row = $row;
                $this->view->render('FacultyModifyCourseView');
            } elseif (isset($_POST["activate"])) {
                $courseid = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->model->updateOne($courseid, $status, $column);
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/FacultyViewCourseController\";</script>";
            } elseif (isset($_POST["deactivate"])) {
                $courseid = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->model->updateOne($courseid, $status, $column);
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/FacultyViewCourseController\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewCourseController\";</script>";
            }
        } elseif (isset($_SESSION['programmecode'])) {
            $courseid = $_SESSION['courseid'];
            $row = $this->model->retrievedByID($courseid);
            $this->view->row = $row;
            $this->view->render('FacultyModifyCourseView');
        }
    }

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $courseid = $_POST["done"];
                $coursecode = $_POST["coursecode"];
                $coursename = $_POST["coursename"];
                $courseinfo = $_POST["courseinfo"];
                $credithour = $_POST["credithour"];

                $errorMessage = "";
                $contextName = new Validator(new ValidationCourseName());
                $errorMessage = $contextName->executeValidatorStrategy($coursename);

                $contextInfo = new Validator(new ValidationCourseInfo());
                $errorMessage .= $contextInfo->executeValidatorStrategy($courseinfo);

                if (empty($errorMessage)) {
                    $this->model->updateAll($courseid, $coursecode, $coursename, $courseinfo, $credithour);
                    echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewCourseController\";</script>";
                } else {
                    echo "<script>alert(\"$errorMessage\"); window.location.href=\"http://localhost/MVC/FacultyViewCourseController/modify\";</script>";
                }
            } elseif (isset($_POST["cancel"])) {
                echo "<script>window.location.href=\"http://localhost/MVC/FacultyViewCourseController\";</script>";
            } else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewCourseController\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewCourseController\";</script>";
        }
    }

}
