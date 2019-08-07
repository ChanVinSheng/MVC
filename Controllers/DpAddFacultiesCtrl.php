<?php

require 'AdapterDP/FacultiesAdapter.php';

class DpAddFacultiesCtrl extends Controller {

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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $rows = $this->model->getWithID("facultyname", $facultyname = $_POST["facultyname"]);
            foreach ($rows as $row) {
                $Exist = $row->facultyname;
            }
            if (!empty($Exist)) {
                echo "<script>alert(\"Existing Faculty\"); window.location.href=\"DpAddFacultiesCtrl\";</script>";
            } else {
                $facultyname = $_POST["facultyname"];
                $facultydescription = $_POST["facultydescription"];
                $feeMin = $_POST["feeMin"];
                $feeMax = $_POST["feeMax"];

                $this->model->add($facultyname, $facultydescription, $feeMin, $feeMax);
                echo "<script>alert(\"Successfully Added\"); window.location.href=\"DpAddFacultiesCtrl\";</script>";
            }
        } else
            $this->view->render('DpAddFacultiesView');
    }

}
