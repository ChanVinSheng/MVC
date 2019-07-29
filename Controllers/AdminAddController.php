<?php

require 'Models/StaffModel.php';
require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationEmail.php';
require_once 'StrategyValidation/ValidationIc.php';

class AdminAddController extends Controller {

    private $model;

    function __construct() {
        $this->model = new StaffModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denie.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        $errorMessage = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = $_POST["password"];
            $role = $_POST["roles"];
            $comfirmedpassword = $_POST["comfirmedpassword"];
            $username = $_POST["username"];
            if (empty($username)) {
                $errorMessage .= "username is required \\n";
            }

            if (!empty($password)) {
                
            } else {
                $errorMessage .= "password is required \\n";
            }

            if (!empty($comfirmedpassword)) {
                
            } else {
                $errorMessage .= "comfirmed password is required \\n";
            }

            $ic = $_POST["ic"];
            if (!empty($ic)) {
                $contextIc = new Validator(new ValidationIc());
                $icExist = $contextIc->executeExistStrategy($ic);
                if (!$icExist) {
                    $errorMessage .= "IC already exist \\n";
                }
            } else {
                $errorMessage .= "ic is required \\n";
            }

            $email = $_POST["email"];
            if (!empty($email)) {
                $contextEmail = new Validator(new ValidationEmail());
                $emailinvalid = $contextEmail->executeValidatorStrategy($email);
                if (!empty($emailinvalid)) {
                    $errorMessage .= $emailinvalid;
                } else {
                    $emailExist = $contextEmail->executeExistStrategy($email);
                    if (!$emailExist) {
                        $errorMessage .= "Email already exist \\n";
                    }
                }
            } else {
                $errorMessage .= "email is required \\n";
            }

            if (empty($errorMessage)) {


                $this->model->insert($username, $password, $email, $ic, $role);
                echo "<script>alert(\"Successfully Added\"); window.location.href=\"AdminAddController\";</script>";
            } else {
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"AdminAddController\";</script>";
            }
        }
        $this->view->render('AdminAddView');
    }

}
