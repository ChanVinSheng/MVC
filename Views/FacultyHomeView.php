<?php /*Author: Low Wei Yin (18WMR08375) RSD3G2*/ ?>

<title>Home</title>
<div class="container">
    <h2><strong>Faculty Management</strong></h2>
    <hr>
    <form  action = "FacultyHomeController" method = "POST">
        <thead><tr><th><h3 style="font-weight: bold">Programmes</h3></th></tr></thead><th/><th/><th/><th/><th/>
        <?php echo $this->programmeXml; ?>
        <td><a href="FacultyAddProgrammeController" class="w3-button w3-blue">Add Programme</a></td>
        <td><a href="FacultyViewProgrammeController" class="w3-button w3-blue">View and Modify Programme</a></td>
        <td/><td/><td/><td/><br/><br/><br/>

        <thead><tr><th><h3 style="font-weight: bold">Courses</h3></th></tr></thead><th/><th/><th/><th/><th/><th/>
        <?php echo $this->courseXml; ?>
        <td><a href="FacultyAddCourseController" class="w3-button w3-blue">Add Course</a></td>
        <td><a href="FacultyViewCourseController" class="w3-button w3-blue">View and Modify Course</a></td>
        <td/><td/><td/><br/><br/><br/>

        <thead><tr><th><h3 style="font-weight: bold">Minimum Entries</h3></th></tr></thead><th/><th/><th/><th/><th/>
        <?php echo $this->minEntryXml; ?>
        <td><a href="FacultyAddMinEntryController" class="w3-button w3-blue">Add Entry</a></td>
        <td><a href="FacultyViewMinEntryController" class="w3-button w3-blue">View and Modify Entry</a></td>
        <td/><br/><br/><br/>

        <thead><tr><th><h3 style="font-weight: bold">Professional Curriculums</h3></th></tr></thead><th/><th/><th/><th/><th/>
        <?php echo $this->curriculumXml; ?>
        <td><a href="FacultyAddCurriculumController" class="w3-button w3-blue">Add Curriculum</a></td>
        <td><a href="FacultyViewCurriculumController" class="w3-button w3-blue">View and Modify Curriculum</a></td>
        <td/><td/><br/><br/><br/>

        <thead><tr><th><h3 style="font-weight: bold">Campuses</h3></th></tr></thead><th/><th/><th/><th/><th/>
        <?php echo $this->campusXml; ?>
        <td><a href="FacultyAddCampusController" class="w3-button w3-blue">Add Campus</a></td>
        <td><a href="FacultyViewCampusController" class="w3-button w3-blue">View and Modify Campus</a></td>
        <td/><br/><br/><br/>

    </form>
</div>