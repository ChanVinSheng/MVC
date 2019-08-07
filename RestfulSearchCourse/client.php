<div class="container">
    <h2>Rest API Client Side Demo</h2>
    <form class="form-inline" action="test/run" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control"  placeholder="Enter Product Name" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($this->found as $character) {
            echo $character  . '<br>';
        };
    }
    ?>
</div>
