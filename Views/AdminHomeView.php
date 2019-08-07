
<div class="container">
    <h1>Staff Information</h1>
    <hr>
    <form  action = "adminhomecontroller" method = "POST">  
        <p>
            <button type="submit" name="All" value="All" class = "btn btn-info">
                All Staff 
            </button>

            <button type="submit" name="Admin" value="Admin" class = "btn btn-info">
                Admin 
            </button>
            <button type="submit" name="AdminFaculty" value="AdminFaculty" class = "btn btn-info">
                Admin Faculty
            </button>

            <button type="submit" name="Faculty" value="Faculty" class = "btn btn-info">
                Faculty 
            </button>
            <button type="submit" name="Department" value="Department" class = "btn btn-info">
                Department 
            </button>
        </p>
    </form>
    <hr>

    <?php echo $this->xml; ?>
    <hr>

</div>