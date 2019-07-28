<?php

require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationEmail.php';

class loginModel extends Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    public function run() {

        $errorMessage = "";

        $password = $_POST["loginpassword"];
        $username = $_POST["loginusername"];



        if (!empty($username)) {
            $context = new Validator(new ValidationEmail());
            $errorMessage = $context->executeValidatorStrategy($username);
        } else {
            $errorMessage .= "username is required \\n";
        }

        if (empty($password)) {
            $errorMessage .= "password is required \\n";
        }

        $rows = $this->db->find("role FROM user WHERE email = :email and password = :password ", array(':email' => $username, ':password' => $password));

        if (empty($errorMessage)) {
            if (!empty($rows->role)) {
                session_start();
                $_SESSION['role'] = $rows->role;
                if ($rows->role == "Admin") {
                    echo "<script>alert(\"Login successful.\"); window.location.href=\"../adminhome\";</script>";
                    // echo "<script>alert(\"Login successful.\");</script>";
                } elseif ($rows->role == "Faculty") {
                    echo "<script>alert(\"Login successful.\")</script>";
                    header('location: ../index');


                    echo "<script>alert(\"Login successful.\")</script>";
                    header('location: ../index');
                } elseif ($rows->role == "Depertmant") {


                    echo "<script>alert(\"Login successful.\")</script>";
                    header('location: ../index');
                }
            } else {
                echo "<script>alert(\"Email Or Password is wrong\")</script>";
                header('location: ../login');
            }
        } else {
            echo "<script>alert(\"$errorMessage\");</script>";
            header('location: ../login');
        }
    }

    function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location: ../login');
    }

}
