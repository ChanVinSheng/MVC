<?php /*Author: Low Wei Yin (18WMR08375) RSD3G2*/ ?>

<title>Modify Professional Curriculum</title>
<div class="container">
    <h2><strong>Modify Professional Curriculum</strong></h2>
    <table class="table">
        <thead>
            <tr bgcolor="#E6E6FA">
                <th>Professional Curriculum ID</th>
                <th>Curriculum Name</th>
                <th>Description</th>
                <th>Actions</th>
                <th/>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
            <form action="http://localhost/MVC/FacultyViewCurriculumController/edit" method="post" >
                <td><label><?php echo $key->curriculumid; ?></label></td>
                <td><input name="curriculumname" type="text" value="<?php echo $key->curriculumname; ?>" style="width: 250px;" readonly="readonly" /></td>
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