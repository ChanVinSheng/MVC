<?php
/*Author: Leek Hon Lun (18WMR08344) RSD3G2*/
require 'Models/studentModel.php';
require "RestfulSearchCourse/api.php";
class student extends Controller {

    private $model;
    private $factory = "foundation";

    function __construct() {
        $this->model = new studentModel();
        parent ::__construct();
    }

    function index() {
        $rows = $this->model->call($this->factory);
        $description = $this->model->getLevel($this->factory);
        $this->view->row = $rows;
        $this->view->desription = $description;
        $this->view->render('student');
    }

    function config() {
        if (isset($_POST["diploma"])) {
            $factory = "diploma";
        } elseif (isset($_POST["degree"])) {
            $factory = "degree";
        } elseif (isset($_POST["foundation"])){
            $factory = "foundation";
        } elseif (isset ($_POST["master"])){
            $factory = "master";
        }
        $rows = $this->model->call($factory);
        $this->view->row = $rows;
        $selected = $this->model->getLevel($factory);
        $this->view->description = $selected;
        $this->view->render('student');
    }
    
    function detail(){
        $selected = $_GET['value'];
        $search = $this->model->getdetail($selected);
        $this->view->show = $search;
        $this->view->render('test');
        //$this->view->row = $search;
        //$this->view->render('detail');
    }
    

    
    function search(){
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $search = $_GET['search'];
            $api = new api();
            $rows = $this->model->getcourse($search);
            $response = $api->getCourse($rows);
            $result = json_decode($response);
            $this->view->found = $result;
            header("Content-Type:text/html");
            $this->view->render('searchCourse');
        }
    }
}
