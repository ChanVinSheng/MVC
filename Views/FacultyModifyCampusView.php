<title>Modify Campus</title>
<div class="container">
    <h2><strong>Modify Campus</strong></h2>
    <table class="table">
        <thead>
            <tr bgcolor="#E6E6FA">
                <th>Campus ID</th>
                <th>Campus Name</th>
                <th>Actions</th>
                <th/>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
            <form action="http://localhost/MVC/FacultyViewCampusController/edit" method="post" >
                <td><label><?php echo $key->campusid; ?></label></td>
                <td><input name="campusname" type="text" value="<?php echo $key->campusname; ?>" style="width: 500px;" /></td>
                <td>
                    <button class="btn btn-info" type="submit" value="<?php echo $key->campusid; ?>" name="done" >Done</button>    
                </td>
                <td>
                    <button class="btn btn-warning" type="submit" value="<?php echo $key->campusid; ?>" name="cancel" >Cancel</button>
                </td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>>