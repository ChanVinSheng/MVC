<?php

require 'Models/FacultyAddCourseModel.php';

class FacultyAddCourseController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyAddCourseModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $coursecode = $_POST["coursecode"];
            $cousename = $_POST["coursename"];
            $courseinfo = $_POST["courseinfo"];
            $credithour = $_POST["credithour"];

            $this->model->insert($coursecode, $cousename, $courseinfo, $credithour);
            echo "<script>alert(\"Successfully Added\"); window.location.href=\"FacultyAddCourseController\";</script>";
        }
        $this->view->render('FacultyAddCourseView');
    }

}
