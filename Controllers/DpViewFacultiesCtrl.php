<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/

require 'AdapterDP/FacultiesAdapter.php';

class DpViewFacultiesCtrl extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultiesAdapter(new DpFacultiesModel());
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $row = $this->model->getAll();
        $this->view->row = $row;
        $this->view->render('DpViewFacultiesView');
    }

    function modify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                $id = $_POST["edit"];
                $row = $this->model->getWithID("Facultyid", $id);
                $this->view->row = $row;
                $this->view->render('DpModifyFacultiesView');
            } elseif (isset($_POST["activate"])) {
                $id = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->model->update($id, $status, $column);
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/DpViewFacultiesCtrl\";</script>";
            } elseif (isset($_POST["deactivate"])) {
                $id = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->model->update($id, $status, $column);
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/DpViewFacultiesCtrl\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/DpViewFacultiesCtrl\";</script>";
            }
        }
    }

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $facultyid = $_POST["done"];
                $facultyname = $_POST["facultyname"];
                $facultydescription = $_POST["facultydescription"];
                $feeMin = $_POST["feeMin"];
                $feeMax = $_POST["feeMax"];
                $this->model->updateAll($facultyid, $facultyname, $facultydescription, $feeMin, $feeMax);
                echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/DpViewFacultiesCtrl\";</script>";
            } elseif (isset($_POST["cancel"])) {
                echo "<script>window.location.href=\"http://localhost/MVC/DpViewFacultiesCtrl\";</script>";
            } else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/DpViewFacultiesCtrl\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/DpViewFacultiesCtrl\";</script>";
        }
    }

}
