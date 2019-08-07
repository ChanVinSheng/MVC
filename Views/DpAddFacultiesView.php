<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Faculties</strong></h2>
    <br/>
    <form action="DpAddFacultiesCtrl" method="post">
        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="facultyname"><strong>Faculty Name: </strong></label></th>
                <td><input name="facultyname" type="text" class="form-control" placeholder="e.g. FOCS..." style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="facultydescription"><strong>Faculty Description: </strong></label></th>
                <td><input name="facultydescription" type="text" class="form-control" placeholder="e.g. Faculty of Science..." style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="feeMin"><strong>Fee Minimum(RM): </strong></label></th>
                <td><input name="feeMin" type="number" step="0.01" class="form-control" placeholder="15000" style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="feeMax"><strong>Fee Maximum(RM): </strong></label></th>
                <td><input name="feeMax" type="number" step="0.01" class="form-control" placeholder="16000" style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="send_btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>