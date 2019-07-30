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
                    <td><?php echo $key->curriculumid; ?></td>
                    <td><?php echo $key->curriculumname; ?></td>
                    <td><?php echo $key->curriculumdesc; ?></td>
        <form action="FacultyViewCurriculumController/modify" method="post" >
                <td><button class="btn btn-info" type="submit" value="<?php echo $key->curriculumid; ?>" name="edit">Edit</button></td>
                <td>
                    <?php if ($key->status == "active") {
                        ?>
                        <button class="btn btn-danger" type="submit" value="<?php echo $key->curriculumid; ?>" name="deactivate">Deactivate</button>
                    <?php } else {
                        ?>
                        <button class="btn btn-success" type="submit" value="<?php echo $key->curriculumid; ?>" name="activate">Activate</button>
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