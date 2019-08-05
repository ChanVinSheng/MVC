<title>Add Programme</title>
<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Programme</strong></h2>
    <br/>
    <form action="FacultyAddProgrammeController/insertDatabase" method="post">
        <table border="1" class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="programmecode"><strong>Programme Code: </strong></label></th>
                <td>
                    <input name="programmecode" type="text" class="form-control" placeholder="e.g. DIT, RSD, FA1..." required  />
                </td>
            </tr>
            <tr>
                <th><label for="description"><strong>Programme Description: </strong></label></th>
                <td><input name="description" type="text" class="form-control" placeholder="Enter Programme Description" required  /></td>
            </tr>
            <tr>
                <th><label for="faculty"><strong>Faculty: </strong></label></th>
                <td>
                    <select name="faculty" class="form-control" required="">
                        <?php
                        foreach ($this->rowFaculties as $faculties) {
                            ?>
                            <option value="<?php echo $faculties->facultyid ?>"><?php echo $faculties->facultyname ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="duration"><strong>Duration of Study: </strong></label></th>
                <td>
                    <select name="duration" class="form-control" required="">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="prog"><strong>Programme Course(s): </strong></label></th>
                <td align="left">
                    <?php
                    foreach ($this->rowCourse as $courses) {
                        if($courses->status == "active"){
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
                        if($campuses->status == "active"){
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
                        if($minEntries->status == "active"){
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
                        if($curriculum->status == "active"){
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