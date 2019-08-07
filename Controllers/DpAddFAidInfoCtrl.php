<?php

require 'AdapterDP/FAidInfoAdapter.php';
require 'AdapterDP/FAidAdapter.php';

class DpAddFAidInfoCtrl extends Controller {

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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $aidinfoname = $_POST["aidinfoname"];
            $aidinfodesc = $_POST["aidinfodesc"];
            $aidinfocgpa = $_POST["aidinfocgpa"];
            $aidinfofee = $_POST["aidinfofee"];
            $financialaidid = $_POST["financialaidid"];

            $this->model->add($aidinfoname, $aidinfodesc, $aidinfocgpa, $aidinfofee, $financialaidid);

            echo "<script>alert(\"Successfully Added\"); window.location.href=\"DpAddFAidInfoCtrl\";</script>";
        } else
            $rowFAid = $this->model2->getAll();
        $this->view->rowFAid = $rowFAid;
        $this->view->render('DpAddFAidInfoView');
    }

}
