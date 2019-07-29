<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Campus ID</th>
                <th>Campus Name</th>
                <th>Actions</th>
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
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>>