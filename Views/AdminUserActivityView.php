<div class="container">
    <br>
    <form class="form-inline md-form mr-auto mb-4" action="http://localhost/MVC/AdminUserActivityController/search?<?php echo $_GET['find']; ?>"method="GET">
        <select class="form-control mr-sm-2"  name="find">
            <option>Edit</option>
            <option>Delete</option>
            <option>Create</option>
            <option>Deactivate</option>
        </select>
        <button class="btn btn-info" type="submit">Find</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Log id</th>
                <th>User id</th>
                <th>Username</th>
                <th>Date & Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <td><?php echo $key->logid; ?></td>
                    <td><?php echo $key->userid; ?></td>
                    <td><?php echo $key->username; ?></td>
                    <td><?php echo $key->date; ?></td>
                    <td><?php echo $key->action; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
