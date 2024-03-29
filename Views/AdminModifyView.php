<?php /*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/ ?>

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
                    <td><?php echo $key['USERNAME']; ?></td>
                    <td> <label><?php echo $key['PASSWORD']; ?></label></td>
                    <td><?php echo $key['EMAIL']; ?></td>
                    <td><?php echo $key['IC']; ?></td>
                    <td><?php echo $key['ROLE']; ?></td>

                    <td>
                        <form action="adminmodifycontroller/modify" method="post" >
                            <?php if ($_SESSION['userid'] == $key['USERID'] || $key['ROLE'] == "Admin") { ?>
                                <button class="btn btn-info" type="submit" value="<?php echo $key['USERID']; ?>" name="edit" disabled >Edit</button>  
                                <button class="btn btn-danger" onclick="return confirm('Confirm Delete?'); type ="submit" value="<?php echo $key['USERID']; ?>" name="delete" disabled  >Delete</button>
                            <?php } else { ?>
                                <button class="btn btn-outline-info" type="submit" value="<?php echo $key['USERID'] ?>" name="edit">Edit</button>  
                                <button class="btn btn-outline-danger"  type="submit" value="<?php echo $key['USERID']; ?>" name="delete" onclick="return confirm('Confirm Delete?');">Delete</button>
                            <?php } ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
