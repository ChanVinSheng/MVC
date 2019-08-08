<?php
/*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/

require 'Models/StaffModel.php';
require 'Models/StaffActivityModel.php';
require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationEmail.php';
require_once 'StrategyValidation/ValidationIc.php';
require_once 'StrategyValidation/ValidationInput.php';
require_once 'StrategyValidation/ValidationPassword.php';

class AdminAddController extends Controller {

    private $model;

    function __construct() {
        $this->model = new StaffModel();
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


        $this->view->render('AdminAddView');
    }

    function add() {


        $errorMessage = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $role = $_POST["roles"];
            $role = dataHandling::HtmlTrimStrips($role);


            $username = $_POST["username"];
            $username = dataHandling::HtmlTrimStrips($username);
            $contextUsername = new Validator(new ValidationInput());
            $errorMessage = $contextUsername->executeValidatorStrategy($username);


            $password = $_POST["password"];
            $password = dataHandling::HtmlTrimStrips($password);
            $contextPassword = new Validator(new ValidationPassword());
            $errorMessage = $contextPassword->executeValidatorStrategy($password);

            $comfirmedpassword = $_POST["comfirmedpassword"];
            $comfirmedpassword = dataHandling::HtmlTrimStrips($comfirmedpassword);
            if (empty($comfirmedpassword)) {
                $errorMessage .= "comfirmed password is required \\n";
            }

            $ic = $_POST["ic"];
            $ic = dataHandling::HtmlTrimStrips($ic);
            $contextIc = new Validator(new ValidationIc());
            $errorIc = $contextIc->executeValidatorStrategy($ic);
            $errorMessage .= $errorIc;
            if (empty($errorIc)) {
                $errorIc = $contextIc->executeExistStrategy($ic);
                if (!empty($errorIc)) {
                    $errorMessage .= $errorIc;
                }
            }

            $email = $_POST["email"];
            $email = dataHandling::HtmlTrimStrips($email);
            $contextEmail = new Validator(new ValidationEmail());
            $errorEmail = $contextEmail->executeValidatorStrategy($email);
            $errorMessage .= $errorEmail;
            if (empty($errorEmail)) {
                $errorEmail = $contextEmail->executeExistStrategy($email);
                if (!empty($errorEmail)) {
                    $errorMessage .= $errorEmail;
                }
            }

            if (empty($errorMessage)) {
                if ($password == $comfirmedpassword) {
                    
                    $userlog = new StaffActivityModel();
                    $userlog->insert($_SESSION['userid'],  $_SESSION['username'], "Add");
                    
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $this->model->insert($username, $hashed_password, $email, $ic, $role);

                    echo "<script>alert(\"Successfully Added\"); window.location.href=\"http://localhost/MVC/AdminAddController\";</script>";
                } else {
                    echo "<script>alert(\"Password does not match\"); window.location.href=\"http://localhost/MVC/AdminAddController\";</script>";
                }
            } else {
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"http://localhost/MVC/AdminAddController\";</script>";
            }
        }
    }

}
