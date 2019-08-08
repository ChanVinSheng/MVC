<?php /*Author: Low Wei Yin (18WMR08375) RSD3G2*/ ?>

<title>View Campuses</title>
<div class="container">
    <h2><strong>View Campuses</strong></h2>
    <table class="table">
        <thead>
            <tr bgcolor="#E6E6FA">
                <th>Campus ID</th>
                <th>Campus Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <td><?php echo $key->campusid; ?></td>
                    <td><?php echo $key->campusname; ?></td>
            <form action="FacultyViewCampusController/modify" method="post" >
                <td>
                    <?php if ($key->status == "active") {
                        ?>
                        <button class="btn btn-danger" type="submit" value="<?php echo $key->campusid; ?>" name="deactivate">Deactivate</button>
                    <?php } else {
                        ?>
                        <button class="btn btn-success" type="submit" value="<?php echo $key->campusid; ?>" name="activate">Activate</button>
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