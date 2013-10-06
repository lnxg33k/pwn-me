<?php
error_reporting(1);
session_start();
if(!isset($_SESSION['username'])){
    header("Location: /scope/users/");
}else{
    if($_SESSION['role'] != 1){
        header("Location: /scope/users/profile.php");
    }
}
include '../config.php';
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

    </head>

    <body>

        <div class="container">

            <?php include '../includes/header.php'; ?>

            <!-- Jumbotron -->
            <div class="jumbotron">
            <h4>Messages need admin approval</h4>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM guestbook where approved=0";
                    $result = mysqli_query($con, $sql);
                    $c = 1;
                    ?>
                    <?php while ($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><?php echo $c ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['body'] ?></td>
                            <td>
                                <a href="#">View</a>
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                        <?php $c++ ?>
                    <?php endwhile; ?>
                </tbody>
            </table>

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
