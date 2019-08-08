<?php
/*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/

require 'Models/StaffModel.php';
require 'Models/StaffActivityModel.php';
require_once 'Models/XmlGenerate.php';
require_once 'Models/userSAXParser.php';

class AdminModifyController extends Controller {

    private $model;

    function __construct() {
        $this->model = new StaffModel();
        session_start();
        parent::__construct();
        if (isset($_SESSION['role'])) {
            if($_SESSION['role'] != "Admin" && $_SESSION['role'] != "Admin Faculty")
                echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
        else{
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        $xml = new XmlGenerate("user");
        $xml->databaseToXml("user", "user.xml");
        $sax = new userSAXParser("user");
        $userdata = $sax->getData();

        $this->view->row = $userdata;
       // $row = $this->model->retrieveAllStaff();
       // $this->view->row = $row;
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

                $userlog = new StaffActivityModel();
                $userlog->insert($_SESSION['userid'], $_SESSION['username'], "Delete");

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
                $ic = $_POST["ic"];
                $role = $_POST["role"];
                $username = $_POST["username"];
                $userid = $_POST["done"];

                $userlog = new StaffActivityModel();
                $userlog->insert($_SESSION['userid'], $_SESSION['username'], "Edit");

                $this->model->update($userid, $username, $ic, $role);
                echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/AdminModifyController\";</script>";
            } else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/AdminModifyController\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/login\";</script>";
        }
    }

}
