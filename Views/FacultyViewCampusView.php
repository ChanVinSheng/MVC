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
                <td><?php echo $key->campusid; ?></td>
                <td><?php echo $key->campusname; ?></td>
                <td>
                    <form action="FacultyViewCampusController/modify" method="post" >
                        <button class="btn btn-info" type="submit" value="<?php echo $key->campusid; ?>" name="edit">Edit</button>
                        <?php if($key->status == "active"){
                        ?>
                        <button class="btn btn-danger" type="submit" value="<?php echo $key->campusid; ?>" name="deactivate">Deactivate</button>
                        <?php }else{
                        ?>
                        <button class="btn btn-success" type="submit" value="<?php echo $key->campusid; ?>" name="activate">Activate</button>
                        <?php }
                            ?>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>