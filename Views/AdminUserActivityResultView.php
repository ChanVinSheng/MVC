<div class="container">
    <br>
    <form class="form-inline md-form mr-auto mb-4" action="http://localhost/MVC/AdminUserActivityController/search?<?php echo $_GET['find']; ?>" method="get">
        <select class="form-control mr-sm-2"  name="find">
            <option>Edit</option>
            <option>Delete</option>
            <option>Create</option>
            <option>Deactivate</option>
        </select>
        <button class="btn btn-info" type="submit">Find</button>
    </form>
    <?php if (array_key_exists("error", $this->found)) { ?>
        <h2><?php echo $this->found->status; ?></h2>
        <?php echo $this->found->error; ?>

    <?php } else { ?>
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
                </tbody>
            </table>
        <?php endforeach; ?>

    <?php } ?>

</div>

