<?php

require 'AdapterDP/LoSAdapter.php';

class DpViewLoSCtrl extends Controller {

    private $model;

    function __construct() {
        $this->model = new LoSAdapter(new DpLoSModel());
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $row = $this->model->getAll();
        $this->view->row = $row;
        $this->view->render('DpViewLoSView');
    }

    function modify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                $LoSid = $_POST["edit"];
                $row = $this->model->getWithID("levelofstudyid", $LoSid);
                $this->view->row = $row;
                $this->view->render('DpModifyLoSView');
            } elseif (isset($_POST["activate"])) {
                $LoSid = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->model->update($LoSid, $status, $column);
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/DpViewLoSCtrl\";</script>";
            } elseif (isset($_POST["deactivate"])) {
                $LoSid = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->model->update($LoSid, $status, $column);
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/DpViewLoSCtrl\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/DpViewLoSCtrl\";</script>";
            }
        }
    }

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $LoSid = $_POST["done"];
                $type = $_POST["type"];
                $column = "type";
                $this->model->update($LoSid, $type, $column);
                echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/DpViewLoSCtrl\";</script>";
            } elseif (isset($_POST["cancel"])) {
                echo "<script>window.location.href=\"http://localhost/MVC/DpViewLoSCtrl\";</script>";
            } else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/DpViewLoSCtrl\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/DpViewLoSCtrl\";</script>";
        }
    }

}
