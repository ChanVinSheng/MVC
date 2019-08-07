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
            <form action="http://localhost/MVC/DpViewFacultiesCtrl/edit" method="post" >
                <td><label><?php echo $key->facultyid; ?></label></td>
                <td><input name="facultyname" type="text" value="<?php echo $key->facultyname; ?>" style="width: 100px;" /></td>
                <td><input name="facultydescription" type="text" value="<?php echo $key->facultydescription; ?>" style="width: 300px;" /></td>
                <td><input name="feeMin" type="number" step="0.01" value="<?php echo $key->feeMin; ?>" style="width: 100px;" /></td>
                <td><input name="feeMax" type="number" step="0.01" value="<?php echo $key->feeMax; ?>" style="width: 100px;" /></td>
                <td>
                    <button class="btn btn-info" type="submit" value="<?php echo $key->facultyid; ?>" name="done" >Done</button>                             

                </td>
                <td>
                    <button class="btn btn-warning" type="submit" value="<?php echo $key->facultyid; ?>" name="cancel" >Cancel</button>
                </td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>