<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    <body>

        <header>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a class="navbar-brand" href="#">Assignment</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">                    
                        <?php if (isset($_SESSION['role'])) { ?>
                            <?php if ($_SESSION['role'] == 'Admin') { ?>



                                <div class="container">
                                    <div class="btn-group"><h2 style="color: white">--Admin--</h2></div>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="<?php echo URL; ?>adminhomecontroller">Home</a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="<?php echo URL; ?>adminaddcontroller">Add user</a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="<?php echo URL; ?>adminmodifycontroller">Modify user</a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="<?php echo URL; ?>AdminUserActivityController">User Activty</a>
                                    </div>




                                </div>
                            <?php } elseif ($_SESSION['role'] == 'Admin Faculty') { ?>


                                <div class="container">
                                    <div class="btn-group"><h2 style="color: white">--Admin Faculty--</h2></div>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="<?php echo URL; ?>adminhomecontroller">Home</a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="<?php echo URL; ?>adminaddcontroller">Add user</a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="<?php echo URL; ?>adminmodifycontroller">Modify user</a>
                                    </div>

                                <?php } elseif ($_SESSION['role'] == 'Faculty') { ?>
                                    <div class="container">
                                        <div class="btn-group">
                                            <a class="btn btn-warning" href="<?php echo URL; ?>FacultyHomeController">Home</a>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning">Programmes</button>
                                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyViewProgrammeController">View All Programmes</a>
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyAddProgrammeController">Add Programme</a>
                                            </div>
                                        </div>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning">Courses</button>
                                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyViewCourseController">View All Courses</a>
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyAddCourseController">Add Course</a>
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultySearchCourseController">Search Course</a>
                                            </div>
                                        </div>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning">Minimum Entry Requirement</button>
                                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyViewMinEntryController">View All Minimum Entries</a>
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyAddMinEntryController">Add Minimum Entry</a>
                                            </div>
                                        </div>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning">Professional Curriculum</button>
                                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyViewCurriculumController">View All Professional Curriculum</a>
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyAddCurriculumController">Add Professional Curriculum</a>
                                            </div>
                                        </div>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning">Campuses</button>
                                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyViewCampusController">View All Campuses</a>
                                                <a class="dropdown-item" href="<?php echo URL; ?>FacultyAddCampusController">Add Campus</a>
                                            </div>
                                        </div>


                                    </div>
                                <?php } ?>


                            <?php } else { ?>
                                <p>NO HEADER</p>
                            <?php } ?>
                    </ul>
                    <?php if (isset($_SESSION['role'])) { ?>
                        <?php if ($_SESSION['role'] == 'Admin') { ?>
                            <form class="form-inline my-2 my-lg-0" action="<?php echo URL; ?>login/logout">
                                <button class="btn btn-success" type="submit">Profile</button>
                            </form>
                        <?php } ?>
                    <?php } ?>
                    <form class="form-inline my-2 my-lg-0" action="<?php echo URL; ?>login/logout">
                        <button class="btn btn-danger"type="submit" onclick="return confirm('Confirm Logout?');">Log out</button>                      
                    </form>
                </div>
            </nav>
        </header>

