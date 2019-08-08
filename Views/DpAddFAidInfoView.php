<?php /*Author: Low Ee Hui (18WMR08374) RSD3G2*/ ?>

<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Financial Aid Information</strong></h2>
    <br/>
    <form action="DpAddFAidInfoCtrl" method="post" id="FAidInfo">

        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="aidinfoname"><strong>F-Aid Organization: </strong></label></th>
                <td><input name="aidinfoname" type="text" class="form-control" placeholder="e.g. TPTPN..." style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="aidinfodesc"><strong>Description: </strong></label></th>
                <td>
                    <textarea rows="4" cols="30" class="form-control" name="aidinfodesc" form="FAidInfo" required></textarea>
                </td>
            </tr>
            <tr>
                <th><label for="aidinfocgpa"><strong>Require CGPA(Per-Sem): </strong></label></th>
                <td><input name="aidinfocgpa" type="number" step="0.01" class="form-control" placeholder="e.g. 3.3..." style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="aidinfofee"><strong>Provide Fee(%): </strong></label></th>
                <td><input name="aidinfofee" type="number" step="0.01" class="form-control" placeholder="e.g. 0.7..." style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="financialaidid"><strong>Category: </strong></label></th>
                <td>
                    <select name="financialaidid" class="form-control" required="">
                        <?php
                        foreach ($this->rowFAid as $FAid) {
                            ?>
                            <option value="<?php echo $FAid->financialaidid ?>"><?php echo $FAid->financialaidname ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="send_btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>