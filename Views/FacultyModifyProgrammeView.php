<title>Modify Programme</title>
<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Modify Programme</strong></h2>
    <br/>
    <?php foreach ($this->row as $key): ?>
        <form action="http://localhost/MVC/FacultyViewProgrammeController\edit" method="post">
            <table border="1" class="form" align="center" cellpadding="7" cellspacing="7">
                <th><label for="programmeid"><strong>Programme ID: </strong></label></th>
                <td><input name="programmeid" type="text" class="form-control" value="<?php echo $key->programmeid; ?>" required disabled="" /></td>
                </tr>
                <tr>
                    <th><label for="programmecode"><strong>Programme Code: </strong></label></th>
                    <td><input name="programmecode" type="text" class="form-control" value="<?php echo $key->programmecode; ?>" placeholder="e.g. DIT, RSD, FA1..." required readonly="readonly" /></td>
                </tr>
                <tr>
                    <th><label for="description"><strong>Programme Description: </strong></label></th>
                    <td><input name="description" type="text" class="form-control" value="<?php echo $key->description; ?>" placeholder="Enter Programme Description" required  /></td>
                </tr>
                <tr>
                    <th><label for="faculty"><strong>Faculty: </strong></label></th>
                    <td>
                        <select name="faculty" class="form-control" required="">
                            <?php
                            foreach ($this->rowFc as $faculties) {
                                ?>
                                <option <?php
                                if ($faculties->facultyid == $key->facultyid) {
                                    echo "selected=\"selected\"";
                                }
                                ?> value="<?php echo $faculties->facultyid ?>"><?php echo $faculties->facultyname ?></option>
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
                            <option <?php
                            if ($key->duration == "1") {
                                echo "selected=\"selected\"";
                            }
                            ?>>1</option>
                            <option <?php
                            if ($key->duration == "2") {
                                echo "selected=\"selected\"";
                            }
                            ?>>2</option>
                            <option <?php
                            if ($key->duration == "3") {
                                echo "selected=\"selected\"";
                            }
                            ?>>3</option>
                            <option <?php
                            if ($key->duration == "4") {
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
                                $tempCount = 0;
                                foreach ($this->rowPStruc as $pStruc) {
                                    if ($pStruc->programmeid == $key->programmeid && $pStruc->courseid == $courses->courseid) {
                                        ?>
                                        <input checked="checked" type="checkbox" name="CourseChk[]" class="CourseGrouped" id="<?php echo $courses->courseid ?>" value="<?php echo $courses->courseid ?>"> <?php echo $courses->coursecode . " " . $courses->coursename ?> 
                                        <br/> 
                                        <?php
                                        $tempCount++;
                                    }
                                }
                                if ($tempCount == 0) {
                                    ?>
                                    <input type="checkbox" name="CourseChk[]" class="CourseGrouped" id="<?php echo $courses->courseid ?>" value="<?php echo $courses->courseid ?>"> <?php echo $courses->coursecode . " " . $courses->coursename ?> 
                                    <br/> 
                                    <?php
                                }
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
                                $tempCount = 0;
                                foreach ($this->rowPCampus as $pCampus) {
                                    if ($pCampus->programmeid == $key->programmeid && $pCampus->campusid == $campuses->campusid) {
                                        ?>
                                        <input checked="checked" type="checkbox" name="CampusChk[]" class="CampusGrouped" id="<?php echo $campuses->campusid ?>" value="<?php echo $campuses->campusid ?>"> <?php echo $campuses->campusname ?>
                                        <br/> 
                                        <?php
                                        $tempCount++;
                                    }
                                }
                                if ($tempCount == 0) {
                                    ?>
                                    <input type="checkbox" name="CampusChk[]" class="CampusGrouped" id="<?php echo $campuses->campusid ?>" value="<?php echo $campuses->campusid ?>"> <?php echo $campuses->campusname ?>
                                    <br/> 
                                    <?php
                                }
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
                                $tempCount = 0;
                                foreach ($this->rowPMinEntry as $pMinEntry) {
                                    if ($pMinEntry->programmeid == $key->programmeid && $pMinEntry->minentryid == $minEntries->minentryid) {
                                        ?>
                                        <input checked="checked" type="checkbox" name="MinEntryChk[]" class="MinEntryGrouped" id="<?php echo $minEntries->minentryid ?>" value="<?php echo $minEntries->minentryid ?>"> <?php echo $minEntries->minentryname ?>
                                        <br/> 
                                        <?php
                                        $tempCount++;
                                    }
                                }
                                if ($tempCount == 0) {
                                    ?>
                                    <input type="checkbox" name="MinEntryChk[]" class="MinEntryGrouped" id="<?php echo $minEntries->minentryid ?>" value="<?php echo $minEntries->minentryid ?>"> <?php echo $minEntries->minentryname ?>
                                    <br/> 
                                    <?php
                                }
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
                                $tempCount = 0;
                                foreach ($this->rowPCurr as $pCurr) {
                                    if ($pCurr->programmeid == $key->programmeid && $pCurr->curriculumid == $curriculum->curriculumid) {
                                        ?>
                                        <input checked="checked" type="checkbox" name="CurriculumChk[]" class="CurriculumGrouped" id="<?php echo $curriculum->curriculumid ?>" value="<?php echo $curriculum->curriculumid ?>"> <?php echo $curriculum->curriculumname ?>
                                        <br/> 
                                        <?php
                                        $tempCount++;
                                    }
                                }
                                if ($tempCount == 0) {
                                    ?>
                                    <input type="checkbox" name="CurriculumChk[]" class="CurriculumGrouped" id="<?php echo $curriculum->curriculumid ?>" value="<?php echo $curriculum->curriculumid ?>"> <?php echo $curriculum->curriculumname ?>
                                    <br/> 
                                    <?php
                                }
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if ($key->status == "active") {
                            ?>
                            <button class="btn btn-danger" type="submit" value="<?php echo $key->programmeid; ?>" name="deactivate">Deactivate</button>
                        <?php } else {
                            ?>
                            <button class="btn btn-success" type="submit" value="<?php echo $key->programmeid; ?>" name="activate">Activate</button>
                        <?php }
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-info" type="submit" value="<?php echo $key->programmeid; ?>" name="done" >Done</button>
                        <button class="btn btn-warning" type="submit" value="Cancel" name="cancel" >Cancel</button>
                    </td>
                </tr>
            </table>
        </form>
    <?php endforeach; ?>
</div>