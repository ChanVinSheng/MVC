<div class="container">
    <br>
    <form class="form-inline md-form mr-auto mb-4"action="http://localhost/MVC/AdminUserActivityController/search?<?php echo $_GET['find'];?>" method="get">
        <input class="form-control mr-sm-2" type="text" name="find" placeholder="Search Action" aria-label="Search">
        <button class="btn btn-info" type="submit">Find</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Log id</th>
                <th>user id</th>
                <th>username</th>
                <th>date</th>
                <th>action</th>
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
