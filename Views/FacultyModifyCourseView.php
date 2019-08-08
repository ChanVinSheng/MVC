<?php /*Author: Low Wei Yin (18WMR08375) RSD3G2*/ ?>

<title>Modify Course</title>
<div class="container">
    <h2><strong>Modify Course</strong></h2>
    <table class="table">
        <thead>
            <tr bgcolor="#E6E6FA">
                <th>Course ID</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Course Info</th>
                <th>Credit Hour(s)</th>
                <th>Actions</th>
                <th/>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
            <form action="http://localhost/MVC/FacultyViewCourseController/edit" method="post" >
                <td><label><?php echo $key->courseid; ?></label></td>
                <td><input name="coursecode" type="text" value="<?php echo $key->coursecode; ?>" style="width: 150px;" readonly="readonly" /></td>
                <td><input name="coursename" type="text" value="<?php echo $key->coursename; ?>" style="width: 250px;" readonly="readonly" /></td>
                <td><input name="courseinfo" type="text" value="<?php echo $key->courseinfo; ?>" style="width: 300px;" /></td>
                <td>
                    <select name="credithour" class="form-control" required="">
                        <option <?php if($key->credithour == "2") {echo "selected=\"selected\"";} ?>>2</option>
                        <option <?php if($key->credithour == "3") {echo "selected=\"selected\"";} ?>>3</option>
                        <option <?php if($key->credithour == "4") {echo "selected=\"selected\"";} ?>>4</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-info" type="submit" value="<?php echo $key->courseid; ?>" name="done" >Done</button>                             

                </td>
                <td>
                    <button class="btn btn-warning" type="submit" value="<?php echo $key->courseid; ?>" name="cancel" >Cancel</button>
                </td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>