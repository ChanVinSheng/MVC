<?php /*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/ ?>
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

    <body  background="<?php echo URL; ?>public/image/login-background.jpg">
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign In</h5>
                            <form class="form-signin" action="login/run" method="post">

                                <div class="form-label-group">
                                    <input type="email"  name="loginusername" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" name="loginpassword" id="inputPassword" class="form-control" placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <?php
                                if (isset($_COOKIE["rememberme"])) {
                                    $pieces = explode(",", $_COOKIE["rememberme"]);
                                    $email = $pieces[0];
                                    $password = $pieces[1];
                                    echo "<script>document.getElementById('inputEmail').value = '$email';document.getElementById('inputPassword').value = '$password';</script>";
                                }                               
                                ?>

                                <div class="custom-control custom-checkbox mb-3">
                                    <input name="check" type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Submit" title="Submit">Sign in</button>      
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>



</html>