<?php /*Author: Low Wei Yin (18WMR08375) RSD3G2*/ ?>

<title>Add Campus</title>
<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Campus</strong></h2>
    <br/>
    <form action="FacultyAddCampusController" method="post">
        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="campusname"><strong>Campus Name: </strong></label></th>
                <td><input name="campusname" type="text" class="form-control" placeholder="e.g. Kuala Lumpur Main Campus" style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>