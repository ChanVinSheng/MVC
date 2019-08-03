<div class="container">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($this->found as $character => $value) {
            echo $value  . '<br>';
        };
    }
    ?>
</div>
