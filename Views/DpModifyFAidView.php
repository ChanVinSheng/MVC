<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Modify Financial Aid</strong></h2>
    <br/>
    <form action="http://localhost/MVC/DpViewFAidCtrl/edit" method="post" enctype="multipart/form-data" id="FAid">
        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <th><label for="financialaidname"><strong>Financial Aid Name: </strong></label></th>
                    <td><input name="financialaidname" type="text" class="form-control" value="<?php echo $key->financialaidname; ?>" style="width: 350px;" required/></td>
                </tr>
                <tr>
                    <th><label for="description"><strong>Description: </strong></label></th>
                    <td>
                        <textarea rows="4" cols="30" class="form-control" name="description" form="FAid" required><?php echo $key->description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th><label for="pictureD"><strong>Picture: </strong></label></th>
                    <td><input name="pictureD" type="text" class="form-control" value="<?php echo $key->picture; ?>" style="width: 200px;" readonly /></td>
                </tr>
                <tr>
                    <th><label for="picture"></label></th>
                    <td><input name="picture" type="file" class="form-control" style="width: 350px;"></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-info" type="submit" value="<?php echo $key->financialaidid; ?>" name="done" >Done</button>                             
                        <button class="btn btn-warning" type="submit" value="<?php echo $key->financialaidid; ?>" name="cancel" >Cancel</button>             
                </tr>
            <?php endforeach; ?>
        </table>
    </form>

</div>