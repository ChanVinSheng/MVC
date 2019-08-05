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
        $context = new Validator(new ValidationEmail());
        $errorMessage = $context->executeValidatorStrategy($username);

        if (empty($password)) {
            $errorMessage .= "password is required \\n";
        }

        $rows = $this->db->find("role , userid , email , password FROM user WHERE email = :email", array(':email' => $username));

        if (empty($errorMessage)) {
            if (password_verify($password, $rows->password)) {
                if (!empty($rows->role)) {
                    session_start();
                    $_SESSION['role'] = $rows->role;
                    $_SESSION['userid'] = $rows->userid;
                    if (isset($_POST['check'])) {
                        setcookie("rememberme", $rows->email . "," . $password, time() + (86400 * 30), "/");
                    }

                    if ($rows->role == "Admin") {
                        echo "<script>alert(\"Login successful.\"); window.location.href=\"../adminhomecontroller\";</script>";
                    } elseif ($rows->role == "Admin Faculty") {
                        echo "<script>alert(\"Login successful.\"); window.location.href=\"../adminhomecontroller\";</script>";
                    } elseif ($rows->role == "Faculty") {
                        echo "<script>alert(\"Login successful.\"); window.location.href=\"../FacultyHomeController\";</script>";
                    } elseif ($rows->role == "Departmant") {
                        echo "<script>alert(\"Login successful.\"); window.location.href=\"../DepartmentHomeController\";</script>";
                    }
                } else {
                    echo "<script>alert(\"Your email or password is wrong\"); window.location.href=\"../login\";</script>";
                }
            }else{
                  echo "<script>alert(\"Your email or password is wrong\"); window.location.href=\"../login\";</script>";
        
            }
        } else {
            echo "<script>alert(\"$errorMessage\"); window.location.href=\"../login\";</script>";
        }
    }

    function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location: ../login');
    }

}
