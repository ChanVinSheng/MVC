<?php

require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationEmail.php';

class loginModel extends Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    public function run() {
        $ip = $_SERVER["REMOTE_ADDR"];
        $count = $this->retriveAttempt($ip);
        if ($count < 3) {
            $errorMessage = "";
            $password = $_POST["loginpassword"];
            $username = $_POST["loginusername"];
            $context = new Validator(new ValidationEmail());
            $errorMessage = $context->executeValidatorStrategy($username);
            if (empty($password)) {
                $errorMessage .= "password is required \\n";
            }
            $rows = $this->db->find("role , userid ,username , email , password FROM user WHERE email = :email", array(':email' => $username));
            if (empty($errorMessage)) {
                if (!empty($rows->password)) {
                    if (password_verify($password, $rows->password)) {
                        if (!empty($rows->role)) {
                            session_start();
                            $_SESSION['role'] = $rows->role;
                            $_SESSION['userid'] = $rows->userid;
                            $_SESSION['username'] = $rows->username;
                            if (isset($_POST['check'])) {
                                setcookie("rememberme", $rows->email . "," . $password, time() + (86400 * 30), "/");
                            }
                            if ($rows->role == "Admin") {
                                echo "<script>alert(\"Login successful.\"); window.location.href=\"../adminhomecontroller\";</script>";
                            } elseif ($rows->role == "Admin Faculty") {
                                echo "<script>alert(\"Login successful.\"); window.location.href=\"../adminhomecontroller\";</script>";
                            } elseif ($rows->role == "Faculty") {
                                echo "<script>alert(\"Login successful.\"); window.location.href=\"../FacultyHomeController\";</script>";
                            } elseif ($rows->role == "Department") {
                                echo "<script>alert(\"Login successful.\"); window.location.href=\"../DpHomeCtrl\";</script>";
                            }
                        } else {
                            $count = $this->retriveAttempt($ip);
                            if ($count[0] > 3) {
                                echo "Your are allowed 3 attempts in 10 minutes";
                            } else {
                                $this->attemp($ip);
                            }
                            echo "<script>alert(\"Your email or password is wrong\"); window.location.href=\"../login\";</script>";
                        }
                    } else {
                        $count = $this->retriveAttempt($ip);
                        if ($count[0] > 3) {
                            echo "Your are allowed 3 attempts in 10 minutes";
                        } else {
                            $this->attemp($ip);
                        }
                        echo "<script>alert(\"Your email or password is wrong\"); window.location.href=\"../login\";</script>";
                    }
                } else {
                    $count = $this->retriveAttempt($ip);
                    if ($count[0] > 3) {
                        echo "Your are allowed 3 attempts in 10 minutes";
                    } else {
                        $this->attemp($ip);
                    }
                    echo "<script>alert(\"Your email or password is wrong\"); window.location.href=\"../login\";</script>";
                }
            } else {
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"../login\";</script>";
            }
        } else {
            echo "<script>alert(\"Your are allowed 3 attempts in 10 minutes\"); window.location.href=\"../login\";</script>";
        }
    }

    function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location: ../login');
    }

    function attemp($ipaddr) {
        $data = array(
            'address' => $ipaddr
        );
        $this->db->insert('ip', $data);
    }

    function retriveAttempt($ipaddr) {
        $count = $this->db->count("*", "`ip` WHERE `address` LIKE '$ipaddr' AND `timestamp` > (now() - interval 10 minute)");
        return $count;
    }

}
