<?php /*Author: Low Ee Hui (18WMR08374) RSD3G2*/ ?>

<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Level Of Study</strong></h2>
    <br/>
    <form action="DpAddLoSCtrl" method="post">
        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="type"><strong>Level of Study Type: </strong></label></th>
                <td><input name="type" type="text" class="form-control" placeholder="e.g. Diploma,Degree..." style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="send_btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>