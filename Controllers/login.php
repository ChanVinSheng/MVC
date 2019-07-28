<?php

require 'Models/loginModel.php';

class login extends Controller {

    private $model;

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

}
