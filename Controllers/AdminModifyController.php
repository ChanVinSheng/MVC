<?php

require 'Models/StaffModel.php';

class AdminModifyController extends Controller {

    private $model;

    function __construct() {
        $this->model = new StaffModel();
        session_start();
        parent::__construct();
    }

    function index() {


        $row = $this->model->retrieveAllStaff();
        $this->view->row = $row;
        $this->view->render('AdminModifyView');
    }

    function modify() {
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                echo "EDIT";
            }
            if (isset($_POST["delete"])) {
                echo "DELETE";
            }
        }
    }

}
