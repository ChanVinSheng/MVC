<title>View Programmes</title>
<div class="container">
    <h2><strong>View Programmes</strong></h2>
    <hr>
    <form  action = "http://localhost/MVC/FacultyViewProgrammeController\modify" method = "POST">
        <table class='table'>
            <thead>
                <tr bgcolor='#E6E6FA'>
                    <th>Programme Code</th>
                    <th>Description</th>
                    <th>Duration of Study</th>
                    <th>Level of Study</th>
                    <th>Faculty</th>
                    <th>Estimated Total Fees(RM)</th>
                    <th>Fees Per Year(RM)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->data as $key): ?>
                    <tr>
                        <td><?php echo $key['PROGRAMMECODE']; ?></td>
                        <td><?php echo $key['DESCRIPTION']; ?></td>
                        <td><?php echo $key['DURATION']; ?></td>
                        <?php
                        foreach ($this->LoS as $Los):
                            if (strtoupper($Los->levelofstudyid) == strtoupper($key['LEVELOFSTUDYID'])) {
                                ?>
                                <td><?php echo $Los->type; ?></td>
                                <?php
                            } endforeach;
                        foreach ($this->Fac as $Fac):
                            if (strtoupper($Fac->facultyid) == strtoupper($key['FACULTYID'])) {
                                ?>
                                <td><?php echo $Fac->facultyname; ?></td>
                                <?php
                            } endforeach;
                        ?>
                        <td><?php echo $key['FEE']; ?></td>
                        <td><?php echo $key['YEARLYFEE']; ?></td>
                        <td><?php echo $key['STATUS']; ?></td>
                    <td><button class='btn btn-info' type='submit' value='<?php echo $key['PROGRAMMECODE']; ?>' name='edit'>Edit</button></td>
                </form>
                </tr>
            <?php endforeach; ?>
            <tbody>
        </table>
    </form>
</div>