<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Minimum Entry ID</th>
                <th>Minimum Entry Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
            <form action="http://localhost/MVC/FacultyViewMinEntryController/edit" method="post" >
                <td><label><?php echo $key->minentryid; ?></label></td>
                <td><input name="minentryname" type="text" value="<?php echo $key->minentryname; ?>" style="width: 500px;" /></td>
                <td>
                    <button class="btn btn-info" type="submit" value="<?php echo $key->minentryid; ?>" name="done" >Done</button>    
                </td>
                <td>
                    <button class="btn btn-warning" type="submit" value="<?php echo $key->minentryid; ?>" name="cancel" >Cancel</button>
                </td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>>