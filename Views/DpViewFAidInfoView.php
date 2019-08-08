<?php /*Author: Low Ee Hui (18WMR08374) RSD3G2*/ ?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Organization</th>
                <th>Description</th>
                <th>CGPA</th>
                <th>Fee(%)</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <td><?php echo $key->aidinfoid; ?></td>
                    <td><?php echo $key->aidinfoname; ?></td>
                    <td><textarea rows="4" cols="30" readonly="" style="resize:none"><?php echo $key->aidinfodesc; ?></textarea></td>
                    <td><?php echo $key->aidinfocgpa; ?></td>
                    <td><?php echo $key->aidinfofee; ?></td>
                    <td>
                        <?php
                        foreach ($this->rowFAidInfo as $key2) {
                            if ($key->financialaidid == $key2->financialaidid) {
                                echo $key2->financialaidname;
                            }
                        }
                        ?>
                    </td>

            <form action="DpViewFAidInfoCtrl/modify" method="post" >
                <td><button class="btn btn-info" type="submit" value="<?php echo $key->aidinfoid; ?>" name="edit">Edit</button></td>
                <td>
                    <?php if ($key->status == "active") {
                        ?>
                        <button class="btn btn-danger" type="submit" value="<?php echo $key->aidinfoid; ?>" name="deactivate">Deactivate</button>
                    <?php } else {
                        ?>
                        <button class="btn btn-success" type="submit" value="<?php echo $key->aidinfoid; ?>" name="activate">Activate</button>
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