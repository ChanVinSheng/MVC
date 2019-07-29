<?php

require 'Models/FacultyAddMinEntryModel.php';

class FacultyAddMinEntryController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyAddMinEntryModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $minentryname = $_POST["minentryname"];

            $this->model->insert($minentryname);
            echo "<script>alert(\"Successfully Added\"); window.location.href=\"FacultyAddMinEntryController\";</script>";
        }
        $this->view->render('FacultyAddMinEntryView');
    }

}
