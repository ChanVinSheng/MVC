<title>View Courses</title>
<div class="container">
    <h2><strong>View Courses</strong></h2>
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
                    <td><?php echo $key->courseid; ?></td>
                    <td><?php echo $key->coursecode; ?></td>
                    <td><?php echo $key->coursename; ?></td>
                    <td><?php echo $key->courseinfo; ?></td>
                    <td><?php echo $key->credithour; ?></td>
            <form action="FacultyViewCourseController/modify" method="post" >
                <td><button class="btn btn-info" type="submit" value="<?php echo $key->courseid; ?>" name="edit">Edit</button></td>
                <td>
                    <?php if ($key->status == "active") {
                        ?>
                        <button class="btn btn-danger" type="submit" value="<?php echo $key->courseid; ?>" name="deactivate">Deactivate</button>
                    <?php } else {
                        ?>
                        <button class="btn btn-success" type="submit" value="<?php echo $key->courseid; ?>" name="activate">Activate</button>
                    <?php }
                    ?>
                </td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>