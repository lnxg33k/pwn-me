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
        <link href="/scope/static/css/app.css" rel="stylesheet">
        <link href="/scope/static/css/bootstrap-responsive.min.css" rel="stylesheet">

        <style>
            pre{
                color: greenyellow;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <?php include '../includes/header.php'; ?>

            <!-- Jumbotron -->
            <div class="jumbotron">
                <a href="index.php?article=index.txt">Welcome Page</a> | 
                <a href="index.php?article=sqli.txt">SQL Injection</a> | 
                <a href="index.php?article=lfi.txt">Local File Inclusion</a> | 
                <a href="index.php?article=xss.txt">Cross Site Scripting</a> | 
                <a href="index.php?article=csrf.txt">Cross Site Request Forgery</a>
                <form action="" method="GET">
                    <input  name="article" type="hidden">
                </form>
                <?php
                if (isset($_GET['article'])) {
                    $article = $_GET['article'];
                    if (preg_match("/.php/i", $article)){
                        die("Not Allowed extention!");
                    }
                    print "<pre>";
                    include(htmlspecialchars("$article", ENT_QUOTES, 'UTF-8', false));
                    print "</pre>";
                } else {
                    print "<pre>";
                    @include('index.txt');
                    print "</pre>";
                }
                ?>
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
        <script src="/scope/static/js/bootstrap.min.js"></script>
    </body>
</html>
