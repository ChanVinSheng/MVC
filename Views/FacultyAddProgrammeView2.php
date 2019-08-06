<title>Add Programme</title>
<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Programme</strong></h2>
    <br/>
    <form action="http://localhost/MVC/FacultyAddProgrammeController/insertDatabase" method="post">
        <table border="1" class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="programmecode"><strong>Programme Code: </strong></label></th>
                <td>
                    <input name="programmecode" type="text" class="form-control" placeholder="e.g. DIT, RSD, FA1..." value="<?php echo $this->tempProgCode; ?>" required readonly="reasonly" />
                </td>
            </tr>
            <tr>
                <th><label for="description"><strong>Programme Description: </strong></label></th>
                <td><input name="description" type="text" class="form-control" placeholder="Enter Programme Description" value="<?php echo $this->tempProgDesc; ?>" required readonly="reasonly" /></td>
            </tr>
            <tr>
                <th><label for="category"><strong>Category: </strong></label></th>
                <td>
                    <select name="category" class="form-control" required="" readonly="">
                        <option <?php
                        if ($this->tempProgCat == "IT") {
                            echo "selected=\"selected\"";
                        }
                        ?>>IT</option>
                        <option <?php
                        if ($this->tempProgCat == "Account") {
                            echo "selected=\"selected\"";
                        }
                        ?>>Account</option>
                        <option <?php
                            if ($this->tempProgCat == "Art") {
                                echo "selected=\"selected\"";
                            }
                            ?>>Art</option>
                        <option <?php
                            if ($this->tempProgCat == "Science") {
                                echo "selected=\"selected\"";
                            }
                            ?>>Science</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="faculty"><strong>Faculty: </strong></label></th>
                <td>
                    <select name="faculty" class="form-control" required="" readonly="">
                        <?php
                        foreach ($this->rowFaculties as $faculties) {
                            if ($faculties->facultyid == $this->tempProgFac) {
                                ?>
                                <option value="<?php echo $faculties->facultyid ?>" selected="selected"><?php echo $faculties->facultyname ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $faculties->facultyid ?>"><?php echo $faculties->facultyname ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="duration"><strong>Duration of Study: </strong></label></th>
                <td>
                    <select name="duration" class="form-control" required="" readonly="">
                        <option <?php
                        if ($this->tempProgDur == "1") {
                            echo "selected=\"selected\"";
                        }
                        ?>>1</option>
                        <option <?php
                        if ($this->tempProgDur == "2") {
                            echo "selected=\"selected\"";
                        }
                        ?>>2</option>
                        <option <?php
                            if ($this->tempProgDur == "3") {
                                echo "selected=\"selected\"";
                            }
                            ?>>3</option>
                        <option <?php
                            if ($this->tempProgDur == "4") {
                                echo "selected=\"selected\"";
                            }
                            ?>>4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="prog"><strong>Programme Course(s): </strong></label></th>
                <td align="left">
                    <?php
                    foreach ($this->rowCourse as $courses) {
                        if ($courses->status == "active") {
                            ?>
                            <input type="checkbox" name="CourseChk[]" class="CourseGrouped" id="<?php echo $courses->courseid ?>" value="<?php echo $courses->courseid ?>"> <?php echo $courses->coursecode . " " . $courses->coursename ?> 
                            <br/>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th><label for="campus"><strong>Campuses Offered: </strong></label></th>
                <td align="left">
                    <?php
                    foreach ($this->rowCampus as $campuses) {
                        if ($campuses->status == "active") {
                            ?>
                            <input type="checkbox" name="CampusChk[]" class="CampusGrouped" id="<?php echo $campuses->campusid ?>" value="<?php echo $campuses->campusid ?>"> <?php echo $campuses->campusname ?>
                            <br/>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th><label for="minentry"><strong>Minimum Requirement Entries: </strong></label></th>
                <td align="left">
                    <?php
                    foreach ($this->rowMinEntry as $minEntries) {
                        if ($minEntries->status == "active" && (substr($minEntries->minentryname,0,2) == $this->tempProgWords)) {
                            ?>
                            <input type="checkbox" name="MinEntryChk[]" class="MinEntryGrouped" id="<?php echo $minEntries->minentryid ?>" value="<?php echo $minEntries->minentryid ?>"> <?php echo $minEntries->minentryname ?>
                            <br/>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th><label for="curriculum"><strong>Incorporation of Professional Curriculum: </strong></label></th>
                <td align="left">
                    <?php
                    foreach ($this->rowCurriculum as $curriculum) {
                        if ($curriculum->status == "active") {
                            ?>
                            <input type="checkbox" name="CurriculumChk[]" class="CurriculumGrouped" id="<?php echo $curriculum->curriculumid ?>" value="<?php echo $curriculum->curriculumid ?>"> <?php echo $curriculum->curriculumname ?>
                            <br/>
        <?php
    }
}
?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>