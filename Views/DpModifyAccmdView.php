<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Modify Accommodation</strong></h2>
    <br/>
    <form action="http://localhost/MVC/DpViewAccmdCtrl/edit" method="post" enctype="multipart/form-data" id="Accmd">
        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <th><label for="branch"><strong>Branch: </strong></label></th>
                    <td><input name="branch" type="text" class="form-control" value="<?php echo $key->branch; ?>" style="width: 350px;" required/></td>
                </tr>
                <tr>
                    <th><label for="type"><strong>Type: </strong></label></th>
                    <td>
                        <select name="type" class="form-control" value="<?php echo $key->type; ?>" required>
                            <option>Condominium</option>
                            <option>Apartment</option>
                            <option>Bungalow</option>
                            <option>Mansion</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="fee"><strong>Fee(RM): </strong></label></th>
                    <td><input name="fee" type="number" step="0.01" class="form-control" value="<?php echo $key->fee; ?>" style="width: 350px;" required/></td>
                </tr>
                <tr>
                    <th><label for="description"><strong>Description: </strong></label></th>
                    <td>
                        <textarea rows="4" cols="30" class="form-control" name="description" form="Accmd" required><?php echo $key->description; ?></textarea>
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
                    <th><label for="location"><strong>Location: </strong></label></th>
                    <td><input name="location" type="text" class="form-control" value="<?php echo $key->location; ?>" style="width: 350px;" required/></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-info" type="submit" value="<?php echo $key->accomodationid; ?>" name="done" >Done</button>                             

                        <button class="btn btn-warning" type="submit" value="<?php echo $key->accomodationid; ?>" name="cancel" >Cancel</button>           
                </tr>

            <?php endforeach; ?>
        </table>
    </form>
</div>