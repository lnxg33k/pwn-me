<?php
error_reporting(1);
session_start();
include 'config.php';
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
            .dl-horizontal{
                text-align: left;
            }
        </style>

    </head>

    <body>

        <div class="container">

            <?php include 'includes/header.php'; ?>

            <!-- Jumbotron -->
            <div class="jumbotron">
                <?php
                $keyword = mysql_real_escape_string(trim($_GET['q']));
                $type = trim($_GET['search_type']);
                if ($type == 'like') {
                    $sql = "SELECT author,title,description FROM exploits WHERE author LIKE '$keyword%' OR title LIKE '$keyword%' OR description LIKE '$keyword%'";
                } elseif ($type == 'exact') {
                    $sql = "SELECT author,title,description FROM exploits WHERE author = '$keyword' OR title = '$keyword' OR description = '$keyword'";
                } else {
                    echo '<div class="alert alert-error">Please, choose a valid search type</div>';
                }
                $result = mysqli_query($con, $sql);
                ?>
                <?php // if ($result): ?>
                    <?php if (mysqli_affected_rows($con) != 0): ?>
                        <?php while ($row = mysqli_fetch_array($result)): ?>
                            <?php
                            print "<pre>";
                            print_r($row);
                            print "</pre>";
                            ?>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="alert alert-error">No results for: <strong><?php echo $keyword; ?></strong></div>
                    <?php endif; ?>
                <?php // else: ?>
                        
                <?php // endif; ?>
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
