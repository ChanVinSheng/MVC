<?php /*Author: Low Ee Hui (18WMR08374) RSD3G2*/ ?>

<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Financial Aid</strong></h2>
    <br/>
    <form action="DpAddFAidCtrl" method="post" enctype="multipart/form-data" id="FAid">

        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="financialaidname"><strong>Financial Aid Name: </strong></label></th>
                <td><input name="financialaidname" type="text" class="form-control" placeholder="e.g. PTPTN..." style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="description"><strong>Description: </strong></label></th>
                <td>
                    <textarea rows="4" cols="30" class="form-control" name="description" form="FAid" required></textarea>
                </td>
            </tr>
            <tr>
                <th><label for="picture"><strong>Picture: </strong></label></th>
                <td><input name="picture" type="file" class="form-control" style="width: 350px;" required></td>
            </tr>

            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="send_btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>