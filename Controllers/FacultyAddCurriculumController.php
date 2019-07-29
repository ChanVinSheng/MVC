<?php

require 'Models/FacultyCurriculumModel.php';

class FacultyAddCurriculumController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyCurriculumModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $curriculumname = $_POST["curriculumname"];
            $curriculumdesc = $_POST["curriculumdesc"];

            $this->model->insert($curriculumname,$curriculumdesc);
            echo "<script>alert(\"Successfully Added\"); window.location.href=\"FacultyAddCurriculumController\";</script>";
        }
        else
            $this->view->render('FacultyAddCurriculumView');
    }

}
