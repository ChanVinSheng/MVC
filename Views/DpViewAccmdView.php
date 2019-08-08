<?php /*Author: Low Ee Hui (18WMR08374) RSD3G2*/ ?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Branch</th>
                <th>Type</th>
                <th>Fee</th>
                <th>Description</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <td><?php echo $key->accomodationid; ?></td>
                    <td><?php echo '<img height="200" width="200" src="picture/'.$key->picture.'">'; ?></td>
                    <td><?php echo $key->branch; ?></td>
                    <td><?php echo $key->type; ?></td>
                    <td><?php echo $key->fee; ?></td>
                    <td><textarea rows="4" cols="30" readonly="" style="resize:none"><?php echo $key->description; ?></textarea></td>
                    <td><?php echo $key->location; ?></td>
            <form action="DpViewAccmdCtrl/modify" method="post" >
                <td><button class="btn btn-info" type="submit" value="<?php echo $key->accomodationid; ?>" name="edit">Edit</button></td>
                <td>
                    <?php if ($key->status == "active") {
                        ?>
                        <button class="btn btn-danger" type="submit" value="<?php echo $key->accomodationid; ?>" name="deactivate">Deactivate</button>
                    <?php } else {
                        ?>
                        <button class="btn btn-success" type="submit" value="<?php echo $key->accomodationid; ?>" name="activate">Activate</button>
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