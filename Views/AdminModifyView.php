<div class="container">
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
                    <td><?php echo $key->password; ?></td>
                    <td><?php echo $key->email; ?></td>
                    <td><?php echo $key->ic; ?></td>
                    <td><?php echo $key->role; ?></td>
                    
                    <td>
                        <form action="adminmodifycontroller/modify" method="post" >
                            <button class="btn btn-info" type="submit" value="<?php echo $key->userid; ?>" name="edit">Edit</button>  
                            <button class="btn btn-danger" type="submit" value="<?php echo $key->userid; ?>" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>