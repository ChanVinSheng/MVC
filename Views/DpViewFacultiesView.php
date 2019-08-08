<?php /*Author: Low Ee Hui (18WMR08374) RSD3G2*/ ?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Faculty ID</th>
                <th>Faculty Name</th>
                <th>Faculty Description</th>
                <th>Fee Min</th>
                <th>Fee Max(s)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <td><?php echo $key->facultyid; ?></td>
                    <td><?php echo $key->facultyname; ?></td>
                    <td><?php echo $key->facultydescription; ?></td>
                    <td><?php echo $key->feeMin; ?></td>
                    <td><?php echo $key->feeMax; ?></td>
            <form action="DpViewFacultiesCtrl/modify" method="post" >
                <td><button class="btn btn-info" type="submit" value="<?php echo $key->facultyid; ?>" name="edit">Edit</button></td>
                <td>
                    <?php if ($key->status == "active") {
                        ?>
                        <button class="btn btn-danger" type="submit" value="<?php echo $key->facultyid; ?>" name="deactivate">Deactivate</button>
                    <?php } else {
                        ?>
                        <button class="btn btn-success" type="submit" value="<?php echo $key->facultyid; ?>" name="activate">Activate</button>
                    <?php }
                    ?>
                </td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>