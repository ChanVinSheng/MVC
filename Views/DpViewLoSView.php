<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Level Of Study ID</th>
                <th>Level Of Study Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <td><?php echo $key->levelofstudyid; ?></td>
                    <td><?php echo $key->type; ?></td>
            <form action="DpViewLoSCtrl/modify" method="post" >
                <td><button class="btn btn-info" type="submit" value="<?php echo $key->levelofstudyid; ?>" name="edit">Edit</button></td>
                <td>
                    <?php if ($key->status == "active") {
                        ?>
                        <button class="btn btn-danger" type="submit" value="<?php echo $key->levelofstudyid; ?>" name="deactivate">Deactivate</button>
                    <?php } else {
                        ?>
                        <button class="btn btn-success" type="submit" value="<?php echo $key->levelofstudyid; ?>" name="activate">Activate</button>
                    <?php }
                    ?>
                </td>
            </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>