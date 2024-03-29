<?php
/*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/

require_once 'Models/XmlGenerate.php';
require_once 'Models/userSAXParser.php';

class AdminHomeController extends Controller {

    function __construct() {
        parent::__construct();
        session_start();
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != "Admin" && $_SESSION['role'] != "Admin Faculty")
                echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
        else {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        $xml = new XmlGenerate("user");
        if (isset($_POST["Admin"])) {

            $xml->databaseToXmlWithSlt("user", "user.xml", "userAdmin");
            $proc = new XsltProcessor;
            $proc->importStylesheet(DOMDocument::load("Xls/userAdmin.xsl")); //load XSL script
            $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
            $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
        } elseif (isset($_POST["AdminFaculty"])) {
            $xml->databaseToXmlWithSlt("user", "user.xml", "userAdminFaculty");
            $proc = new XsltProcessor;
            $proc->importStylesheet(DOMDocument::load("Xls/userAdminFaculty.xsl")); //load XSL script
            $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
            $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
        } elseif (isset($_POST["Faculty"])) {
            $xml->databaseToXmlWithSlt("user", "user.xml", "userFaculty");
            $proc = new XsltProcessor;
            $proc->importStylesheet(DOMDocument::load("Xls/userFaculty.xsl")); //load XSL script
            $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
            $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
        } elseif (isset($_POST["Department"])) {
            $xml->databaseToXmlWithSlt("user", "user.xml", "userDepartment");
            $proc = new XsltProcessor;
            $proc->importStylesheet(DOMDocument::load("Xls/userDepartment.xsl")); //load XSL script
            $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
            $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
        } else {
            $xml->databaseToXml("user", "user.xml");
            $sax = new userSAXParser("user");
            $userdata = $sax->getData();
            $output = "<h3>All Staff</h3>";
            $output .= "<hr />";
            $output .= '<table class="table">';
            $output .= '<tr bgcolor="#9acd32">';
            $output .= "<th>User ID</th>";
            $output .= "<th>User Name</th>";
            $output .= "<th>Password</th>";
            $output .= "<th>Email</th>";
            $output .= "<th>Role</th>";
            $output .= "</tr>";
            foreach ($userdata as $user) {
                $output .= "<tr>";
                $output .= "<td>" . $user['USERID'] . "</td>";
                $output .= "<td>" . $user['USERNAME'] . "</td>";
                $output .= "<td>" . $user['PASSWORD'] . "</td>";
                $output .= "<td>" . $user['EMAIL'] . "</td>";
                $output .= "<td>" . $user['ROLE'] . "</td>";
                $output .= "</tr>";
            }
            $output .= "</table>";
            $this->view->xml = $output;
        }


        $this->view->render('AdminHomeView');
    }

}
