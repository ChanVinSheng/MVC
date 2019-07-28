<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">
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

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo URL; ?>adminhomecontroller">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo URL; ?>adminaddcontroller">Add user</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo URL; ?>adminmodifycontroller">Modify user</a>
                                </li>


                            <?php } elseif ($_SESSION['role'] == 'Faculty') { ?>
                                <div class="container">
                                    <div class="btn-group"><h2 style="color: white">--Faculty Staff--</h2></div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning">Programmes</button>
                                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">View All Programmes</a>
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">Add Programme</a>
                                        </div>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning">Courses</button>
                                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">View All Courses</a>
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">Add Course</a>
                                        </div>
                                    </div>
                                    
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning">Minimum Entry Requirement</button>
                                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">View All Minimum Entries</a>
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">Add Minimum Entry</a>
                                        </div>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning">Professional Curriculum</button>
                                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">View All Professional Curriculum</a>
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">Add Professional Curriculum</a>
                                        </div>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning">Campuses</button>
                                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">View All Campuses</a>
                                            <a class="dropdown-item" href="<?php echo URL; ?>Faculty">Add Campus</a>
                                        </div>
                                    </div>


                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <p>Invalid</p>
                        <?php } ?>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-success my-2 my-sm-0" href="<?php echo URL; ?>login/logout" type="submit" onclick="return confirm('Confirm Logout?');">Log out</a>                      
                    </form>
                </div>
            </nav>
        </header>

