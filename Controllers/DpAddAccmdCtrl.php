<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/

require 'AdapterDP/AccmdAdapter.php';

class DpAddAccmdCtrl extends Controller {

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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $branch = $_POST["branch"];
            $type = $_POST["type"];
            $fee = $_POST["fee"];
            $description = $_POST["description"];
            $location = $_POST["location"];

            $picture = $_FILES["picture"]["name"];
            $allowed = array('gif', 'png', 'jpg', 'jpeg');
            $ext = pathinfo($picture, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                echo "<script>alert(\"Invalid File Format\"); window.location.href=\"DpAddAccmdCtrl\";</script>";
            } else {
                $this->model->add($branch, $type, $fee, $description, $picture, $location);
                move_uploaded_file($_FILES["picture"]["tmp_name"], "picture/$picture");
                echo "<script>alert(\"Successfully Added\"); window.location.href=\"DpAddAccmdCtrl\";</script>";
            }
        } else
            $this->view->render('DpAddAccmdView');
    }

}
