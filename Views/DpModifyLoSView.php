<?php /*Author: Low Ee Hui (18WMR08374) RSD3G2*/ ?>

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
            <form action="http://localhost/MVC/DpViewLoSCtrl/edit" method="post" >
                <td><label><?php echo $key->levelofstudyid; ?></label></td>
                <td><input name="type" type="text" value="<?php echo $key->type; ?>" style="width: 500px;" /></td>
                <td>
                    <button class="btn btn-info" type="submit" value="<?php echo $key->levelofstudyid; ?>" name="done" >Done</button>    
                </td>
                <td>
                    <button class="btn btn-warning" type="submit" value="<?php echo $key->levelofstudyid; ?>" name="cancel" >Cancel</button>
                </td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>>