<?php /*Author: Low Wei Yin (18WMR08375) RSD3G2*/ ?>

<title>Add Course</title>
<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Course</strong></h2>
    <br/>
    <form action="FacultyAddCourseController" method="post">
        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="coursecode"><strong>Course Code: </strong></label></th>
                <td><input name="coursecode" type="text" class="form-control" placeholder="e.g. BAIT3173..." style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="coursename"><strong>Course Name: </strong></label></th>
                <td><input name="coursename" type="text" class="form-control" placeholder="e.g. Integrative Programming" style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="courseinfo"><strong>Course Information: </strong></label></th>
                <td><input name="courseinfo" type="text" class="form-control" placeholder="Enter Course Info" style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="credithour"><strong>Credit Hour(s): </strong></label></th>
                <td>
                    <select name="credithour" class="form-control" required="">
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>