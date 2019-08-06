<?php

require 'Models/loginModel.php';

class login extends Controller {

    private $model;
    private $ip;

    function __construct() {
        $this->model = new loginModel();
        parent::__construct();
    }

    function index() {
        $this->view->render('login', true);
    }

    function run() {
        $this->model->run();
    }

    function logout() {
        $this->model->logout();
    }

    function retriveAttempt() {
        $count = $this->model->retriveAttempt($this->ip);
        if ($count[0] > 3) {
            echo "Your are allowed 3 attempts in 10 minutes";
        }
    }

}
