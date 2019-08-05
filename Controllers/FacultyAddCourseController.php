<?php

require 'Models/StaffActivityModel.php';
require 'Models/FacultyCourseModel.php';

require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationCourseCode.php';
require_once 'StrategyValidation/ValidationCourseName.php';
require_once 'StrategyValidation/ValidationCourseInfo.php';

class FacultyAddCourseController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyCourseModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $coursecode = strtoupper($_POST["coursecode"]);
            $coursename = $_POST["coursename"];
            $courseinfo = $_POST["courseinfo"];
            $credithour = $_POST["credithour"];

            $errorMessage = "";
            $contextCode = new Validator(new ValidationCourseCode());
            $errorMessage = $contextCode->executeValidatorStrategy($coursecode);

            $contextName = new Validator(new ValidationCourseName());
            $errorMessage .= $contextName->executeValidatorStrategy($coursename);

            $contextInfo = new Validator(new ValidationCourseInfo());
            $errorMessage .= $contextInfo->executeValidatorStrategy($courseinfo);

            if (empty($errorMessage)) {
                $this->model->insert($coursecode, $coursename, $courseinfo, $credithour);
                $userlog = new StaffActivityModel();
                $userlog->insert($_SESSION['userid'], $_SESSION['username'], "Add");
                echo "<script>alert(\"Successfully Added\"); window.location.href=\"FacultyAddCourseController\";</script>";
            } else {
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"http://localhost/MVC/FacultyAddCourseController\";</script>";
            }
        } else
            $this->view->render('FacultyAddCourseView');
    }

}
