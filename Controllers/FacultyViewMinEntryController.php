<?php

require 'Models/FacultyMinEntryModel.php';
require 'Models/StaffActivityModel.php';

class FacultyViewMinEntryController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyMinEntryModel();
        parent::__construct();
        session_start();
        if (isset($_SESSION['role'])) {
            if($_SESSION['role'] != "Faculty")
                echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
        else{
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
            $userlog = new StaffActivityModel();

            if (isset($_POST["activate"])) {
                $minentryid = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->model->updateOne($minentryid, $status, $column);

                $userlog->insert($_SESSION['userid'], $_SESSION['username'], "Activate");
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";
            } elseif (isset($_POST["deactivate"])) {
                $minentryid = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->model->updateOne($minentryid, $status, $column);

                $userlog->insert($_SESSION['userid'], $_SESSION['username'], "Deactivate");
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewMinEntryController\";</script>";
            }
        }
    }

}
