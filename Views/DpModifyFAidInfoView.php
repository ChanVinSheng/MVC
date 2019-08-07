<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Modify Financial Aid Information</strong></h2>
    <br/>
    <form action="http://localhost/MVC/DpViewFAidInfoCtrl/edit" method="post" id="FAidInfo">

        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <?php foreach ($this->row as $key): ?>
                <tr>
                    <th><label for="aidinfoname"><strong>F-Aid Organization: </strong></label></th>
                    <td><input name="aidinfoname" type="text" class="form-control" value="<?php echo $key->aidinfoname; ?>" style="width: 350px;" required/></td>
                </tr>
                <tr>
                    <th><label for="aidinfodesc"><strong>Description: </strong></label></th>
                    <td>
                        <textarea rows="4" cols="30" class="form-control" name="aidinfodesc" form="FAidInfo" required><?php echo $key->aidinfodesc; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th><label for="aidinfocgpa"><strong>Require CGPA(Per-Sem): </strong></label></th>
                    <td><input name="aidinfocgpa" type="number" step="0.01" class="form-control" value="<?php echo $key->aidinfocgpa; ?>" style="width: 350px;" required/></td>
                </tr>
                <tr>
                    <th><label for="aidinfofee"><strong>Provide Fee(%): </strong></label></th>
                    <td><input name="aidinfofee" type="number" step="0.01" class="form-control" value="<?php echo $key->aidinfofee; ?>" style="width: 350px;" required/></td>
                </tr>
                <tr>
                    <th><label for="financialaidid"><strong>Category: </strong></label></th>
                    <td>
                        <select id="set" name="financialaidid" class="form-control" required="">
                            <?php foreach ($this->rowFAidInfo as $FAid): ?> 
                                <option value="<?php echo $FAid->financialaidid ?>"
                                <?php if ($FAid->financialaidid == $key->financialaidid): ?>
                                            selected="selected"
                                        <?php endif; ?>
                                        >
                                            <?php echo $FAid->financialaidname ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-info" type="submit" value="<?php echo $key->aidinfoid; ?>" name="done" >Done</button>                             
                        <button class="btn btn-warning" type="submit" value="<?php echo $key->aidinfoid; ?>" name="cancel" >Cancel</button>             
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>