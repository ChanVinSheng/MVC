<?php

require 'Models/StaffActivityModel.php';
require 'Models/FacultyCurriculumModel.php';

require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationCurrName.php';
require_once 'StrategyValidation/ValidationDesc.php';

class FacultyAddCurriculumController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyCurriculumModel();
        parent::__construct();
        session_start();
        if (isset($_SESSION['role'])) {
            if($_SESSION['role'] != "Faculty")
                echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
        else{
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $curriculumname = $_POST["curriculumname"];
            $curriculumdesc = $_POST["curriculumdesc"];

            $errorMessage = "";
            $contextName = new Validator(new ValidationCurrName());
            $errorMessage = $contextName->executeValidatorStrategy($curriculumname);

            $contextDesc = new Validator(new ValidationDesc());
            $errorMessage .= $contextDesc->executeValidatorStrategy($curriculumdesc);

            if (empty($errorMessage)) {
                $this->model->insert($curriculumname, $curriculumdesc);
                $userlog = new StaffActivityModel();
                $userlog->insert($_SESSION['userid'], $_SESSION['username'], "Add");
                echo "<script>alert(\"Successfully Added\"); window.location.href=\"FacultyAddCurriculumController\";</script>";
            } else {
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"http://localhost/MVC/FacultyAddCurriculumController\";</script>";
            }
        } else
            $this->view->render('FacultyAddCurriculumView');
    }

}
