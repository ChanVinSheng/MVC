<?php

require 'AdapterDP/FAidAdapter.php';
require 'AdapterDP/FAidInfoAdapter.php';

class DpViewFAidInfoCtrl extends Controller {

    private $model;

    function __construct() {
        $this->model = new FAidInfoAdapter(new DpFAidInfoModel());
        $this->model2 = new FAidAdapter(new DpFAidModel());
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        $row = $this->model->getAll();
        $rowFAidInfo = $this->model2->getAll();
        $this->view->row = $row;
        $this->view->rowFAidInfo = $rowFAidInfo;
        $this->view->render('DpViewFAidInfoView');
    }

    function modify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                $id = $_POST["edit"];
                $row = $this->model->getWithID($id);
                $rowFAidInfo = $this->model2->getAll();
                $this->view->rowFAidInfo = $rowFAidInfo;
                $this->view->row = $row;
                $this->view->render('DpModifyFAidInfoView');
            } elseif (isset($_POST["activate"])) {
                $id = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->model->update($id, $status, $column);
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/DpViewFAidInfoCtrl\";</script>";
            } elseif (isset($_POST["deactivate"])) {
                $id = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->model->update($id, $status, $column);
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/DpViewFAidInfoCtrl\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/DpViewFAidInfoCtrl\";</script>";
            }
        }
    }

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $aidinfoid = $_POST["done"];
                $aidinfoname = $_POST["aidinfoname"];
                $aidinfodesc = $_POST["aidinfodesc"];
                $aidinfocgpa = $_POST["aidinfocgpa"];
                $aidinfofee = $_POST["aidinfofee"];
                $financialaidid = $_POST["financialaidid"];

                $this->model->updateAll($aidinfoid, $aidinfoname , $aidinfodesc , $aidinfocgpa, $aidinfofee, $financialaidid);
                echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/DpViewFAidInfoCtrl\";</script>";
            } elseif (isset($_POST["cancel"])) {
                echo "<script>window.location.href=\"http://localhost/MVC/DpViewFAidInfoCtrl\";</script>";
            } else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/DpViewFAidInfoCtrl\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/DpViewFAidInfoCtrl\";</script>";
        }
    }

}
