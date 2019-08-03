<?php

require 'Models/StaffActivityModel.php';
require 'RestfulSearch/api.php';

class AdminUserActivityController extends Controller {

    private $model;

    function __construct() {
        $this->model = new StaffActivityModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denie.\"); window.location.href=\"login\";</script>";
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
            $row = $this->model->retrieveAllActivitybyAction($search);
            $response = $api->getAction($row);
            $result = json_decode($response);
            $this->view->found = $result;
            header("Content-Type:text/html");
            $this->view->render('AdminUserActivityResultView');
        }
    }

}
