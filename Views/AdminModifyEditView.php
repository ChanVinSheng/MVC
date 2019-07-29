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
            <td><input name="username" type="text" value="<?php echo $key->username; ?>"/></td>
            <td><input name="password" type="text" value="<?php echo $key->password; ?>"/></td>
            <td><input name="email" type="text" value="<?php echo $key->email; ?>"/></td>
            <td><input name="ic" type="text" value="<?php echo $key->ic; ?>"/></td>
            <td><input name="role" type="text" value="<?php echo $key->role; ?>"/></td>
            <td>
                <button class="btn btn-info" type="submit" value="<?php echo $key->userid; ?>" name="done">Done</button>                             

            </td>
        </form>
    </tr>
<?php endforeach; ?>
</tbody>
</table>