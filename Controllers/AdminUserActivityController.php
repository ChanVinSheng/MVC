<?php
/*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/

require 'Models/StaffActivityModel.php';
require 'RestfulSearch/api.php';

class AdminUserActivityController extends Controller {

    private $model;

    function __construct() {
        $this->model = new StaffActivityModel();
        parent::__construct();
        session_start();
        if (isset($_SESSION['role'])) {
            if($_SESSION['role'] != "Admin" && $_SESSION['role'] != "Admin Faculty")
                echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
        else{
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        $row = $this->model->retrieveAllActivity();
        $this->view->row = $row;
        $this->view->render('AdminUserActivityView');
    }

    function search() {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $search = $_GET['find'];
            $api = new api();
            $rows = $this->model->retrieveAllActivitybyAction($search);
            $response = $api->getAction($rows);
            $result = json_decode($response);
            $this->view->found = $result;
            header("Content-Type:text/html");
            $this->view->render('AdminUserActivityResultView');
        }
    }

}
