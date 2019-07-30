<?php

require 'Models/FacultyMinEntryModel.php';

class FacultyViewMinEntryController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyMinEntryModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $row = $this->model->retrieveAllMinEntry();
        $this->view->row = $row;
        $this->view->render('FacultyViewMinEntryView');
    }

    function modify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                $minentryid = $_POST["edit"];
                $row = $this->model->retrievedByID($minentryid);
                $this->view->row = $row;
                $this->view->render('FacultyModifyMinEntryView');
            } elseif (isset($_POST["activate"])) {
                $minentryid = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->model->updateOne($minentryid, $status, $column);
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";    
            } elseif (isset($_POST["deactivate"])) {
                $minentryid = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->model->updateOne($minentryid, $status, $column);
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";
            }
        }
    }

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $minentryid = $_POST["done"];
                $minentryname = $_POST["minentryname"];
                $column = "minentryname";
                $this->model->updateOne($minentryid, $minentryname, $column);
                echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";
            }
            elseif (isset($_POST["cancel"])) {
                echo "<script>window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";
            } 
            else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";
        }
    }

}
