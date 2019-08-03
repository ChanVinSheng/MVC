<div class="container">
    <br>
    <form class="form-inline md-form mr-auto mb-4"action="http://localhost/MVC/AdminUserActivityController/search?<?php echo $_GET['find']; ?>" method="get">
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
            <?php foreach ($this->found as $values): ?>
                    <tr>
                        <td><?php echo $values->logid; ?></td>
                        <td><?php echo $values->userid; ?></td>
                        <td><?php echo $values->username; ?></td>
                        <td><?php echo $values->date; ?></td>
                        <td><?php echo $values->action; ?></td>

                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

