<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/

require 'AdapterDP/AccmdAdapter.php';

class DpViewAccmdCtrl extends Controller {

    private $model;

    function __construct() {
        $this->model = new AccmdAdapter(new DpAccmdModel());
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        $row = $this->model->getAll();
        $this->view->row = $row;
        $this->view->render('DpViewAccmdView');
    }

    function modify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                $id = $_POST["edit"];
                $row = $this->model->getWithID($id);
                $this->view->row = $row;
                $this->view->render('DpModifyAccmdView');
            } elseif (isset($_POST["activate"])) {
                $id = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->model->update($id, $status, $column);
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/DpViewAccmdCtrl\";</script>";
            } elseif (isset($_POST["deactivate"])) {
                $id = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->model->update($id, $status, $column);
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/DpViewAccmdCtrl\";</script>";
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/DpViewAccmdCtrl\";</script>";
            }
        }
    }

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $accomodationid = $_POST["done"];
                $branch = $_POST["branch"];
                $type = $_POST["type"];
                $fee = $_POST["fee"];
                $description = $_POST["description"];

                if ($_FILES['picture']['name'] == "") {
                    $picture = $_POST["pictureD"];
                    $location = $_POST["location"];
                    $this->model->updateAll($accomodationid, $branch, $type, $fee, $description, $picture, $location);
                    echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/DpViewAccmdCtrl\";</script>";
                } else {
                    $picture = $_FILES["picture"]["name"];
                    $allowed = array('gif', 'png', 'jpg', 'jpeg');
                    $ext = pathinfo($picture, PATHINFO_EXTENSION);
                    if (!in_array($ext, $allowed)) {
                        echo "<script>alert(\"Incalid File Format\"); window.location.href=\"http://localhost/MVC/DpViewAccmdCtrl\";</script>";
                    } else {
                        $location = $_POST["location"];
                        $this->model->updateAll($accomodationid, $branch, $type, $fee, $description, $picture, $location);
                        move_uploaded_file($_FILES["picture"]["tmp_name"], "picture/$picture");
                        echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/DpViewAccmdCtrl\";</script>";
                    }
                }
            } elseif (isset($_POST["cancel"])) {
                echo "<script>window.location.href=\"http://localhost/MVC/DpViewAccmdCtrl\";</script>";
            } else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/DpViewAccmdCtrl\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/DpViewAccmdCtrl\";</script>";
        }
    }

}
