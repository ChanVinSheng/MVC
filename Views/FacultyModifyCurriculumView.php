<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Professional Curriculum ID</th>
                <th>Curriculum Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
            <form action="http://localhost/MVC/FacultyViewCurriculumController/edit" method="post" >
                <td><label><?php echo $key->curriculumid; ?></label></td>
                <td><input name="curriculumname" type="text" value="<?php echo $key->curriculumname; ?>" style="width: 250px;" /></td>
                <td><input name="curriculumdesc" type="text" value="<?php echo $key->curriculumdesc; ?>" style="width: 500px;" /></td>
                <td>
                    <button class="btn btn-info" type="submit" value="<?php echo $key->curriculumid; ?>" name="done" >Done</button>    
                </td>
                <td>
                    <button class="btn btn-warning" type="submit" value="<?php echo $key->curriculumid; ?>" name="cancel" >Cancel</button>
                </td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>>