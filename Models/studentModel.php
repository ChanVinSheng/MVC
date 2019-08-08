<?php
/*Author: Leek Hon Lun (18WMR08344) RSD3G2*/
require_once 'AbstractFactory/AbstractFactory.php';
require_once 'AbstractFactory/ShowFoundationFactory.php';
require_once 'AbstractFactory/ShowDiplomaFactory.php';
require_once 'AbstractFactory/ShowDegreeFactory.php';
require_once 'AbstractFactory/ShowMasterFactory.php';
require_once 'Controllers/programmeDetailController.php';
require_once 'Controllers/programmeLevelController.php';
require_once 'programmeDetailSAXParser.php';
require_once 'minentryDetailSAXParser.php';
require_once 'typeDetailSAXParser.php';
require_once 'courseDetailSAXParser.php';
require_once 'feeDetailSAXParser.php';
require_once 'curriculumDetailSAXParser.php';
require_once 'campusDetailSAXParser.php';
class studentModel extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function getLevel($level){
        $show = AbstractFactory::getFactory($level)->getShow();
        $levelXml = new programmeLevelController("levelofstudy",$show);
        $levelXml-> databaseToXmlWithSlt("levelofstudy","levelofstudy.xml","level");
        $proc = new XsltProcessor;
        $proc->importStylesheet(DOMDocument::load("Xls/level.xsl")); //load XSL script
       return $proc->transformToXML(DOMDocument::load("Xml/levelofstudy.xml"));
    }

    function call($level) {
        $show = AbstractFactory::getFactory($level)->getShow();
        $rows = $this->db->select("p.description, l.levelofstudyid, l.type FROM programme p, levelofstudy l "
                . "WHERE p.levelofstudyid = l.levelofstudyid "
                . "AND l.levelofstudyid = :levelofstudyid " , array(':levelofstudyid' => $show->getName()));
        return $rows;
    }
    
    function getCompare($compare){
        $rows = $this->db->select("curriculumname FROM professionalcurriculum where curriculumname != :curriculumname ", array(':curriculumname' => $compare));

        return $rows;
    }
    function getdetail($find){
        $programmeDetailsXml = new programmeDetailController();
        $saxp = new programmeDetailSAXParser("programmeDetail");
        $programmeDetailData = $saxp->getData();
        
        $minentryDetail = new programmeDetailController();
        $saxp = new minentryDetailSAXParser("minentryDetail");
        $minentryDetailData = $saxp->getData();
        
        $typeDetail = new programmeDetailController();
        $saxp = new typeDetailSAXParser("typeDetail");
        $typeDetailData = $saxp->getData();
        
        $courseDetail = new programmeDetailController();
        $saxp = new courseDetailSAXParser("courseDetail");
        $courseDetailData = $saxp->getData();
        
        $feeDetail = new programmeDetailController();
        $saxp = new feeDetailSAXParser("feeDetail");
        $feeDetailData = $saxp->getData();
        
        $curriculumDetail = new programmeDetailController();
        $saxp = new curriculumDetailSAXParser("curriculumDetail");
        $curriculumDetailData = $saxp->getData();
        
        $campusDetail = new programmeDetailController();
        $saxp = new campusDetailSAXParser("campusDetail");
        $campusDetailData = $saxp->getData();
        
        $output = '<table class="table">';
        $output .= "<tbody>";
        $output .= "<tr>";
        $output .= "<th>Programme Code</th>";
        
        foreach($programmeDetailData as $programmeDetails){
            if($programmeDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $programmeDetails['PROGRAMMECODE']."</td>";
            break;    
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .= "<th>Description</th>";
        foreach($programmeDetailData as $programmeDetails){
            if($programmeDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $programmeDetails['DESCRIPTION']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .= "<th>Duration of Study</th>";
        foreach ($programmeDetailData as $programmeDetails){
            if($programmeDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $programmeDetails['DURATION']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .= "<th>Level of Study</th>";
        foreach ($typeDetailData as $typeDetails){
            if($typeDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $typeDetails['TYPE']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .= "<th>MER</th>";
        foreach ($minentryDetailData as $minentryDetails){
            if($minentryDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $minentryDetails['MINENTRYNAME']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .= "<th>Course Name</th>";
        foreach ($courseDetailData as $courseDetails){
            if($courseDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $courseDetails['COURSENAME']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .="<th>Minimum Fee</th>";
        foreach ($feeDetailData as $feeDetails){
            if($feeDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $feeDetails['FEEMIN']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .="<th>Maximum Fee</th>";
        foreach ($feeDetailData as $feeDetails){
            if($feeDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $feeDetails['FEEMAX']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .="<th>Professional Certificate Name</th>";
        foreach ($curriculumDetailData as $curriculumDetails){
            if($curriculumDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $curriculumDetails['CURRICULUMNAME']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .="<th>Professional Certificate Description</th>";
        foreach ($curriculumDetailData as $curriculumDetails){
            if($curriculumDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $curriculumDetails['CURRICULUMDESC']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= "<tr>";
        $output .="<th>Campus</th>";
        foreach ($campusDetailData as $campusDetails){
            if($campusDetails['DESCRIPTION'] == $find){
            $output .= "<td>" . $campusDetails['CAMPUSNAME']."</td>";
            break;
            }
        }
        $output .= "</tr>";
        $output .= '</tbody>';
        $output .= '</table>';
        return $output;
        
    }
    
    function getcourse($find){
        $rows = $this->db->select("p.programmecode, p.description "
                . "FROM programme p "
                . "WHERE p.category = :category ", array(':category' => $find));
        
        return $rows;
    }
    function programmeDetail(){
        $rows = $this->db->select("programmeid, programmecode, description, duration FROM programme");
        return $rows;
    }
    function minentryDetail(){
        $rows = $this->db->select("m.minentryname, p.programmecode, p.description "
                  . "FROM programme p, minentry m, programmeminentry m1 "
                  . "WHERE p.programmeid = m1.programmeid AND m1.minentryid = m.minentryid ");
        return $rows;
    }
    function typeDetail(){
        $rows = $this->db->select("p.programmecode, p.description, l.type "
                . "FROM programme p, levelofstudy l "
                . "WHERE p.levelofstudyid = l.levelofstudyid ");
                return $rows;
    }
    function courseDetail(){
        $rows = $this->db->select("p.programmecode, p.description, co.coursename "
                . "FROM programme p, programmestructure co1, courses co "
                . "WHERE p.programmeid = co1.programmeid AND co1.courseid = co.courseid ");
                return $rows;
    }
    function feeDetail(){
        $rows = $this->db->select("p.programmecode, p.description, f.feeMin, f.feeMax "
                . "FROM programme p, faculties f "
                . "WHERE p.facultyid = f.facultyid ");
                return $rows;
    }
    function curriculumDetail(){
        $rows = $this->db->select("p.programmecode, p.description, cu.curriculumname, cu.curriculumdesc "
                . "FROM programme p, programmecurriculum cu1, professionalcurriculum cu "
                . "WHERE p.programmeid = cu1.programmeid AND cu1.curriculumid = cu.curriculumid ");
                return $rows;
    }
    function campusDetail(){
        $rows = $this->db->select("p.programmecode, p.description, ca.campusname "
                . "FROM programme p, programmecampus ca1, campus ca "
                . "WHERE p.programmeid = ca1.programmeid AND ca1.campusid = ca.campusid ");
                return $rows;
    }
}
