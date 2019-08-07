<title>Home</title>
<div class="container">
    <h2><strong>Faculty Management</strong></h2>
    <hr>
    <form  action = "DpHomeCtrl" method = "POST">
        
        <thead><tr><th><h3 style="font-weight: bold">Faculties</h3></th></tr></thead><th/><th/><th/><th/><th/>
        <?php echo $this->facultiesXml; ?>
        <td/><br/><br/><br/>
        <thead><tr><th><h3 style="font-weight: bold">Level Of Study</h3></th></tr></thead><th/><th/><th/><th/><th/>
        <?php echo $this->LoSXml; ?>
        <td/><br/><br/><br/>
        <thead><tr><th><h3 style="font-weight: bold">Accommodation</h3></th></tr></thead><th/><th/><th/><th/><th/>
        <?php echo $this->AccmdXml; ?>
        <td/><br/><br/><br/>
        <thead><tr><th><h3 style="font-weight: bold">Financial Aid</h3></th></tr></thead><th/><th/><th/><th/><th/>
        <?php echo $this->FAidXml; ?>
        <td/><br/><br/><br/>
        <thead><tr><th><h3 style="font-weight: bold">F-Aid Information</h3></th></tr></thead><th/><th/><th/><th/><th/>
        <?php echo $this->FAidInfoXml; ?>
        <td/><br/><br/><br/>
        <?php echo $this->xml; ?>
    </form>
</div>
