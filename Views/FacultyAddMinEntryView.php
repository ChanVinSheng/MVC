<title>Add Minimum Entry</title>
<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Minimum Entry Requirement</strong></h2>
    <br/>

    <form action="FacultyAddMinEntryController/insert" method="post">
        <table class="form" border="1" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <td><strong>Choose Level: </strong></td>
                <td>
                    <select class="form-control" name="level">
                        <option>Foundation</option>
                        <option>Diploma</option>
                        <option>Degree</option>
                        <option>Master</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Choose Topic: </strong></td>
                <td>
                    <select class="form-control" name="topic">
                        <option>SPM</option>
                        <option>O Level</option>
                        <option>UEC</option>
                        <option>STPM</option>
                        <option>A Level</option>
                        <option>Bachelor's Degree</option>
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
                        <option>Grade A</option>
                        <option>Grade B</option>
                        <option>CGPA 2.5</option>
                        <option>CGPA 3.0</option>
                    </select>    
                </td>
            </tr>
            <tr>
                <td><strong>Choose Category: </strong></td>
                <td>
                    <select class="form-control" name="category">
                        <option>Credit in</option>
                        <option>Grade in</option>
                        <option>in</option>
                    </select>    
                </td>
            </tr>
            <tr>
                <td><strong>Choose Subject: </strong></td>
                <td>
                    <select class="form-control" name="subject">
                        <option>Relevant Subjects</option>
                        <option>English</option>
                        <option>Malay</option>
                        <option>Mathematics</option>
                    </select>   
                </td>
            </tr>
        </table>
        <button class="btn btn-info" style=" width: 360px;" type="submit" value="sbumit" name="submit" >Submit</button>


    </form>



</div>
