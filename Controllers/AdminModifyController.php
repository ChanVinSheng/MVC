<?php

require 'Models/StaffModel.php';

class AdminModifyController extends Controller {

    private $model;

    function __construct() {
        $this->model = new StaffModel();
        session_start();
        parent::__construct();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denie.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {


        $row = $this->model->retrieveAllStaff();
        $this->view->row = $row;
        $this->view->render('AdminModifyView');
    }

    function modify() {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {

                $userid = $_POST["edit"];
                $row = $this->model->retrieveSpecficStaffbyId($userid);
                $this->view->row = $row;
                $this->view->render('AdminModifyEditView');
            } elseif (isset($_POST["delete"])) {
                $userid = $_POST["delete"];
                $this->model->delete($userid);
                echo "<script>alert(\"Successfully Delete\"); window.location.href=\"http://localhost/MVC/AdminModifyController\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/AdminModifyController\";</script>";
            }
        }
    }

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $email = $_POST["email"];
                $ic = $_POST["ic"];
                $password = $_POST["password"];
                $role = $_POST["role"];
                $username = $_POST["username"];
                $userid = $_POST["done"];
                $this->model->update($userid, $username, $password, $email, $ic, $role);
                echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/AdminModifyController\";</script>";
            } else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/AdminModifyController\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/login\";</script>";
        }
    }

}
