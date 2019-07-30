<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Professional Curriculum</strong></h2>
    <br/>
    <form action="FacultyAddCurriculumController" method="post">
        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="curriculumname"><strong>Professional Curriculum Name: </strong></label></th>
                <td><input name="curriculumname" type="text" class="form-control" placeholder="Enter Curriculum Name" style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="curriculumdesc"><strong>Professional Curriculum Description: </strong></label></th>
                <td><input name="curriculumdesc" type="text" class="form-control" placeholder="Enter Curriculum Description" style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="send_btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>