<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

require 'Models/StaffActivityModel.php';
require 'Models/FacultyCampusModel.php';

require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationCampusName.php';

class FacultyAddCampusController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyCampusModel();
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
            $campusname = $_POST["campusname"];

            $errorMessage = "";
            $contextName = new Validator(new ValidationCampusName());
            $errorMessage = $contextName->executeValidatorStrategy($campusname);

            if (empty($errorMessage)) {
                $campusname = dataHandling::HtmlStrips($campusname);
                $this->model->insert($campusname);
                $userlog = new StaffActivityModel();
                $userlog->insert($_SESSION['userid'], $_SESSION['username'], "Add");
                echo "<script>alert(\"Successfully Added\"); window.location.href=\"FacultyAddCampusController\";</script>";
            } else {
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"http://localhost/MVC/FacultyAddCampusController\";</script>";
            }
        } else
            $this->view->render('FacultyAddCampusView');
    }

}
