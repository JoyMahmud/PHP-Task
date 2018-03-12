<?php

    /*User Signup information save in the database calling here*/
    $message = '';
    if(isset($_POST['btn'])){
    require_once('../class/userLogin/signup.php');
    $obj_signup = new Signup();
    $message = $obj_signup->save_userSignup_info($_POST);
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Car Bikroy Mela | User Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.5.0/css/font-awesome.min.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Oleo+Script:400,700" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="body-bg">

<!-- Login page body start-->
<div class="login-page-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Form content box start-->
                <div class="form-content-box">
                    <div class="logo-the carhouse">
                        <a href="../index.php">
                            <img src="img/png/logo.png" alt="logo">
                        </a>
                    </div>
                    <h4>Please Fill Up this form Carefully!</h4>
                    <h3 class="text-center text-success">
                        <?php
                        if(isset($message)){
                            echo $message;
                        }
                        ?></h3>

                    <form method="post" class="login" action="">
                        <div class="form-group">
                            <input type="text" class="input-text" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="input-text" name="last_name" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="input-text" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="input-text" name="password" placeholder="password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="input-text" name="Confirm" placeholder="Confirm password">
                        </div>

                        <input type="submit" name="btn" class="btn btn-send btn-block" value="Login">

                        <p class="lost-password">
                            Already have an account? <a href="login.php">click here to login</a>
                        </p>
                    </form>
                </div>
                <!-- Form content box End-->
            </div>
        </div>
    </div>
</div>
<!-- Login page body end-->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-83150110-3', 'auto');
    ga('send', 'pageview');

</script>
</body>

</html>