
<div class="container">
    <h1>Staff Information</h1>
    <hr>
    <?php echo $this->xml; ?>
    <hr>
    <form  action = "adminhomecontroller" method = "POST">  
        <p>
            <button type="submit" name="All" value="All" class = "btn btn-info">
                All Staff 
            </button>

            <button type="submit" name="Admin" value="Admin" class = "btn btn-info">
                Admin
            </button>
        </p>
    </form>
</div>