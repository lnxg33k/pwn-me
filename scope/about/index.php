<?php
error_reporting(1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Template &middot; Bootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="/scope/static/css/bootstrap.min.css" rel="stylesheet">

        <link href="/scope/static/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="/scope/static/css/app.css" rel="stylesheet">
        <style>
            .hero-unit{
                background-color: transparent;
                padding: 0px;
            }
            .footer{
                text-align: left;
            }
        </style>

    </head>

    <body>

        <div class="container">

            <?php include '../includes/header.php'; ?>

            <!-- Jumbotron -->
            <div class="jumbotron">
                <div class="hero-unit">
                    <h2>Ruined-Sec Crew!</h2>
                    <!--<br />-->
                    <!--<p>Our blog is all about Information security. We don’t imply We’re ruining security. We target security experts. Our goal is to provide as much information as possible to you!</p>-->
                    <p>This site was made to help security people and web developers to test their development skills and get more familiar with common attack vectors that target web nowadays.</p>
                    <p class="text text-error"><strong>Please,</strong> don't try to simulate those apps in a production server.</p>
                </div>

                <hr>


                <div class="footer">
                    <p>Welcome to Change your mind - Demo by <a href="http://ruinedsec.wordpress.com">ruined-sec</a> | <a href="https://www.twitter.com/lnxg33k">@lnxg33k</a>.</p>
                </div>

            </div> <!-- /container -->

            <!-- Le javascript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="/scope/static/js/jquery.js"></script>
            <script src="/scope/static/js/bootstrap-transition.js"></script>
            <script src="/scope/static/js/bootstrap.min.js"></script>
    </body>
</html>
