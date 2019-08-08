<!-- Author: Leek Hon Lun (18WMR08344) RSD3G2 -->

<div class="container">
<form action="http://localhost/MVC/student/search?<?php echo $_GET['search']; ?>" method="GET">
    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Action" aria-label="Search">
    <input type="submit" value="Submit"><br/>
</form>
<?php if (array_key_exists("error", $this->found)) { ?>
    <h2><?php echo $this->found->status; ?></h2>
    <?php echo $this->found->error; ?>

<?php } else { ?>
    <table class="table">
        <thead>
            <tr>
                <th>Programme code</th>
                <th>Programme name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->found as $values): ?>
                <tr>
                    <td><?php echo $values->programmecode; ?></td>
                    <td><?php echo $values->description; ?></td>

                </tr>
            <?php endforeach; ?>
        <?php }
        ?>
</div>
