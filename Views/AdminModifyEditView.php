
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
            <form action="http://localhost/MVC/adminmodifycontroller/edit" method="post" >
                <td><input class="form-control" id="usernname" name="username" type="text" value="<?php echo $key->username; ?>"/></td>
                <td><label class="form-control text-danger" name="password" type="text"><?php echo $key->password; ?></label></td>
                <td><label class="form-control text-danger" name="email" type="text" ><?php echo $key->email; ?></label></td>
                <td><input class="form-control" name="ic" type="text" value="<?php echo $key->ic; ?>"/></td>
                <td>
                <select class="form-control mr-sm-2" name="role">
                        <option value="Admin" <?php if($key->role == "Admin") echo "SELECTED";?> >Admin</option>
                        <option value="Admin Faculty" <?php if($key->role == "Admin Faculty") echo "SELECTED";?> >Admin Faculty</option>
                        <option value="Faculty" <?php if($key->role == "Faculty") echo "SELECTED";?> >Faculty</option>
                        <option value="Department" <?php if($key->role == "Department") echo "SELECTED";?> >Department</option>
                    </select>
                </td>            
                <td>
                    <button class="btn btn-info" type="submit" value="<?php echo $key->userid; ?>" name="done">Done</button>                             

                </td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>