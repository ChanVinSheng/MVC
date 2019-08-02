<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Minimum Entry Requirement</strong></h2>
    <br/>

    <form action="FacultyAddMinEntryController/insert" method="post">
        <table class="form" border="1" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <td><strong>Choose Topic: </strong></td>
                <td>
                    <select class="form-control" name="topic">
                        <option>SPM</option>
                        <option>STPM</option>
                        <option>A LEVEL</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Choose Requirement: </strong></td>
                <td>
                    <select class="form-control" name="requirement">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>    </td>
            </tr>
            <tr>
                <td><strong>Choose Category: </strong></td>
                <td>
                    <select class="form-control" name="category">
                        <option>Credit</option>
                        <option>Grade</option>
                    </select>    </td>
            </tr>
            <tr>
                <td><strong>Choose Subject: </strong></td>
                <td>
                    <select class="form-control" name="subject">
                        <option>Relevant Subject</option>
                        <option>English</option>
                        <option>Malay</option>
                    </select>   </td>
            </tr>
        </table>
        <button class="btn btn-warning" style=" width: 360px;" type="submit" value="sbumit" name="submit" >Submit</button>


    </form>



</div>
