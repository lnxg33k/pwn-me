<?php
error_reporting(0);
if(!isset($_SESSION)){
    session_start();
}
$current_action = $_SERVER['REQUEST_URI'];
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
        <link href="static/css/bootstrap.min.css" rel="stylesheet">
        <link href="/scope/static/css/app.css" rel="stylesheet">
        <link href="static/css/bootstrap-responsive.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <?php include 'includes/header.php'; ?>
            <!-- Jumbotron -->
            <div class="jumbotron">
                <h1>Exploiting Stuff!</h1>
                <p class="lead">Find a previously unknown method for dismantling the defenses of a device like an iPhone or iPad, for instance, and you can report it to Apple and present it at a security conference to win fame and lucrative consulting gigs. Share it with HP’s <font color="red">Zero Day</font> Initiative instead and earn as much as $10,000 for helping the firm shore up its security gear.</p>
                <?php if (!$_SESSION['username']): ?>
                    <a class="btn btn-large btn-success" href="/scope/users/">Login and Get started today</a>
                <?php else: ?>
                    <a class="btn btn-large btn-success" href="https://www.twitter.com/lnxg33k">Follow us on Twitter for updates</a>
                <?php endif; ?>
            </div>

            <hr>

            <!-- Example row of columns -->
            <div class="row-fluid">
                <?php
                $sql = "SELECT * FROM news";
                $result = mysqli_query($con, $sql);
                ?>
                <?php while ($row = mysqli_fetch_array($result)): ?>
                    <div class="span4">
                        <h2><?php echo $row['title']; ?></h2>
                        <p><?php echo $row['description']; ?></p>
                        <p><a class="btn btn-danger" href="<?php echo $row['url'] ?>">View details &raquo;</a></p>
                    </div>
                <?php endwhile; ?>
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

