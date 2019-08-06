<title>Search Course</title>
<div class="container">
    <h2><strong>Search Course</strong></h2>
    <hr>
    <form  action = "FacultySearchCourseController" method = "POST">  
        <p>

            <strong>Search Course Code with: </strong>
            <select class="form-control" id='courseCodeCat' name="courseCodeCat">
                <option>All</option>
                <option>BACS</option>
                <option>BAIT</option>
                <option>MPU</option>
            </select>
            <button class="btn btn-info" style=" width: 360px;" type="submit" id="submit" name="submit" >Search</button>
    </form>
    <?php
    if ($this->sortBy == "All") {
        ?>
        <body></body>
        <h3 style='font-weight: bold;'>All Courses</h3>
        <hr />
        <form  action = "FacultyViewCourseController/modify" method = "POST">  
            <table class="table">
                <thead>
                    <tr bgcolor="#E6E6FA">
                        <th>Course ID</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Course Information</th>
                        <th>Credit Hour(s)</th>
                        <th>Actions</th>
                        <th/>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->coursedata as $key): ?>
                        <tr>
                            <td><?php echo $key['COURSEID']; ?></td>
                            <td><?php echo $key['COURSECODE']; ?></td>
                            <td><?php echo $key['COURSENAME']; ?></td>
                            <td><?php echo $key['COURSEINFO']; ?></td>
                            <td><?php echo $key['CREDITHOUR']; ?></td>
                            <td><button class="btn btn-info" type="submit" value="<?php echo $key['COURSEID']; ?>" name="edit">Edit</button></td>
                            <td>
                                <?php if ($key['STATUS'] == "active") {
                                    ?>
                                    <button class="btn btn-danger" type="submit" value="<?php echo $key['COURSEID']; ?>" name="deactivateSort">Deactivate</button>
                                <?php } else {
                                    ?>
                                    <button class="btn btn-success" type="submit" value="<?php echo $key['COURSEID']; ?>" name="activateSort">Activate</button>
                                <?php }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </body>
    <?php
} else {
    echo $this->xml;
}
?>
</p>
<hr>
<hr>

</div>