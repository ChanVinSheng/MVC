<!DOCTYPE html>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Programme</th>
            </tr>
        </thead>
        <br>
        <br>
        <form action="http://localhost/MVC/student/search?<?php echo $_GET['search']; ?>" method="GET">
            <input class="form-control" type="text" name="search" placeholder="Search Action" aria-label="Search">
            <button class="form-control btn btn-outline-success" type="submit" value="Submit">Search</button><br/>
        </form>
        <br>
        <br>
        
        <tbody>
            <?php foreach ($this->row as $key): ?>
            <form action ="http://localhost/MVC/student/config" method="post">
                <?php if ($key->levelofstudyid == 1) {
                    ?>

                    <div class="container">
                        <div class="btn-group">
                            <button class="btn btn-danger" type="submit" value="<?php echo $key->find; ?>" name="diploma">Diploma</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-info" type="submit" value="<?php echo $key->find; ?>" name="degree">Degree</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-warning" type="submit" value="<?php echo $key->find; ?>" name="master">Master</button>
                        </div>
                    </div>


                    <?php break; ?>
                <?php } elseif ($key->levelofstudyid == 2) {
                    ?>
                <div class="container">
                        <div class="btn-group">
                            <button class="btn btn-success" type="submit" value="<?php echo $key->find; ?>" name="foundation">Foundation</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-info" type="submit" value="<?php echo $key->find; ?>" name="degree">Degree</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-warning" type="submit" value="<?php echo $key->find; ?>" name="master">Master</button>
                        </div>
                    </div>
                    <?php break; ?>
                <?php } elseif ($key->levelofstudyid == 3) {
                    ?>
                <div class="container">
                        <div class="btn-group">
                            <button class="btn btn-success" type="submit" value="<?php echo $key->find; ?>" name="foundation">Foundation</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-danger" type="submit" value="<?php echo $key->find; ?>" name="diploma">Diploma</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-warning" type="submit" value="<?php echo $key->find; ?>" name="master">Master</button>
                        </div>
                    </div>
                    <?php break; ?>
                <?php } elseif ($key->levelofstudyid == 4) {
                    ?>
                <div class="container">
                        <div class="btn-group">
                            <button class="btn btn-success" type="submit" value="<?php echo $key->find; ?>" name="foundation">Foundation</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-danger" type="submit" value="<?php echo $key->find; ?>" name="diploma">Diploma</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-info" type="submit" value="<?php echo $key->find; ?>" name="degree">Degree</button>
                        </div>
                    </div>
                        <?php break; ?>
                <?php }
                ?>

            </form>
        <?php endforeach; ?>
        <?php foreach ($this->row as $key): ?>
            <tr>
                <td><a href="http://localhost/MVC/student/detail?value=<?php echo $key->description; ?>"><?php echo $key->description; ?></a><td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>