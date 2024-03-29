<?php /*Author: Low Wei Yin (18WMR08375) RSD3G2*/ ?>

<title>Add Programme</title>
<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Programme</strong></h2>
    <br/>
    <form action="http://localhost/MVC/FacultyAddProgrammeController/nextAdd" method="post">
        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="programmecode"><strong>Programme Code: </strong></label></th>
                <td>
                    <input name="programmecode" type="text" class="form-control" placeholder="e.g. DIT, RSD, FA1..." required  />
                </td>
            </tr>
            <tr>
                <th><label for="description"><strong>Programme Description: </strong></label></th>
                <td><input name="description" type="text" class="form-control" placeholder="Enter Programme Description" required  /></td>
            </tr>
            <tr>
                <th><label for="category"><strong>Category: </strong></label></th>
                <td>
                    <select name="category" class="form-control" required="">
                        <option>IT</option>
                        <option>Account</option>
                        <option>Art</option>
                        <option>Science</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="faculty"><strong>Faculty: </strong></label></th>
                <td>
                    <select name="faculty" class="form-control" required="">
                        <?php
                        foreach ($this->rowFaculties as $faculties) {
                            ?>
                            <option value="<?php echo $faculties->facultyid ?>"><?php echo $faculties->facultyname ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="duration"><strong>Duration of Study: </strong></label></th>
                <td>
                    <select name="duration" class="form-control" required="">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="btn btn-info" type="submit" value="Next" title="Next" />                      
            </tr>
        </table>
    </form>
</div>