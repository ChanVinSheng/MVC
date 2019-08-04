<title>View Minimum Entries</title>
<div class="container">
    <h2><strong>View Minimum Entries</strong></h2>
    <table class="table">
        <thead>
            <tr bgcolor="#E6E6FA">
                <th>Minimum Entry ID</th>
                <th>Minimum Entry Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <td><?php echo $key->minentryid; ?></td>
                    <td><?php echo $key->minentryname; ?></td>
            <form action="FacultyViewMinEntryController/modify" method="post" >
                <td>
                    <?php if ($key->status == "active") {
                        ?>
                        <button class="btn btn-danger" type="submit" value="<?php echo $key->minentryid; ?>" name="deactivate">Deactivate</button>
                    <?php } else {
                        ?>
                        <button class="btn btn-success" type="submit" value="<?php echo $key->minentryid; ?>" name="activate">Activate</button>
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