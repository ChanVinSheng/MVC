<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>IC</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <td><?php echo $key->username; ?></td>
                    <td> <label><?php echo $key->password; ?></label></td>
                    <td><?php echo $key->email; ?></td>
                    <td><?php echo $key->ic; ?></td>
                    <td><?php echo $key->role; ?></td>

                    <td>
                        <form action="adminmodifycontroller/modify" method="post" >
                            <?php if ($_SESSION['userid'] == $key->userid) { ?>
                            <button class="btn btn-info" type="submit" value="<?php echo $key->userid; ?>" name="edit" disabled >Edit</button>  
                                <button class="btn btn-danger" onclick="return confirm('Confirm Delete?'); type="submit" value="<?php echo $key->userid; ?>" name="delete" disabled  >Delete</button>
                            <?php } else { ?>
                                <button class="btn btn-outline-info" type="submit" value="<?php echo $key->userid; ?>" name="edit">Edit</button>  
                                <button class="btn btn-outline-danger"  type="submit" value="<?php echo $key->userid; ?>" name="delete" onclick="return confirm('Confirm Delete?');">Delete</button>
                            <?php } ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
