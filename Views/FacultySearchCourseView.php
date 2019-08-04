<title>Search Course</title>
<div class="container">
    <h2><strong>Search Course</strong></h2>
    <hr>
    <form  action = "FacultySearchCourseController" method = "POST">  
        <p>

            <strong>Search Course Code with: </strong>
            <select class="form-control" id='courseCodeCat' name="courseCodeCat">
                <option>All</option>
                <option>BACS</option>
                <option>BAIT</option>
                <option>MPU</option>
            </select>
            <button class="btn btn-info" style=" width: 360px;" type="submit" id="submit" name="submit" >Search</button>
        </td>
        </p>
    </form>
    <hr>

    <?php echo $this->xml; ?>
    <hr>

</div>